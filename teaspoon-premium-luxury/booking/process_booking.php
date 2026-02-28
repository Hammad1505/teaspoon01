<?php
/**
 * Process Table Booking
 * Handles AJAX requests for seat/table reservations
 */

session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../mail/send_mail.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(false, 'Invalid request method');
}

// Get and sanitize input
$name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
$phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : '';
$date = isset($_POST['date']) ? sanitizeInput($_POST['date']) : '';
$time = isset($_POST['time']) ? sanitizeInput($_POST['time']) : '';
$seats = isset($_POST['seats']) ? sanitizeInput($_POST['seats']) : '';
$occasion = isset($_POST['occasion']) ? sanitizeInput($_POST['occasion']) : '';

// Validation
$errors = [];

if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Please enter a valid name';
}

if (empty($phone) || !validatePhone($phone)) {
    $errors[] = 'Please enter a valid 10-digit phone number';
}

if (empty($date)) {
    $errors[] = 'Please select a date';
}

if (empty($time)) {
    $errors[] = 'Please select a time';
}

if (empty($seats)) {
    $errors[] = 'Please select number of guests';
}

// Validate date is not in the past
$booking_date = strtotime($date);
$today = strtotime(date('Y-m-d'));

if ($booking_date < $today) {
    $errors[] = 'Please select a future date';
}

// Validate time format
if (!preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $time)) {
    $errors[] = 'Invalid time format';
}

// If there are validation errors, return them
if (!empty($errors)) {
    jsonResponse(false, implode('. ', $errors));
}

// Basic spam protection - check session
if (!isset($_SESSION['booking_count'])) {
    $_SESSION['booking_count'] = 0;
    $_SESSION['booking_time'] = time();
}

// Limit to 3 bookings per session within 1 hour
if ($_SESSION['booking_count'] >= 3 && (time() - $_SESSION['booking_time']) < 3600) {
    jsonResponse(false, 'Too many bookings in a short time. Please call us instead at +91 80066 77660');
}

try {
    $db = getDB();
    
    // Check for duplicate booking (same phone, date, time)
    $check_sql = "SELECT id FROM seat_bookings 
                  WHERE customer_phone = :phone 
                  AND booking_date = :date 
                  AND booking_time = :time 
                  AND status != 'cancelled'";
    
    $check_stmt = $db->prepare($check_sql);
    $check_stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $check_stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $check_stmt->bindParam(':time', $time, PDO::PARAM_STR);
    $check_stmt->execute();
    
    if ($check_stmt->rowCount() > 0) {
        jsonResponse(false, 'You already have a booking for this date and time. Please choose a different time or call us.');
    }
    
    // Prepare SQL statement
    $sql = "INSERT INTO seat_bookings 
            (customer_name, customer_phone, booking_date, booking_time, number_of_seats, occasion, created_at, status) 
            VALUES (:name, :phone, :date, :time, :seats, :occasion, NOW(), 'pending')";
    
    $stmt = $db->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':time', $time, PDO::PARAM_STR);
    $stmt->bindParam(':seats', $seats, PDO::PARAM_STR);
    $stmt->bindParam(':occasion', $occasion, PDO::PARAM_STR);
    
    // Execute query
    if ($stmt->execute()) {
        $booking_id = $db->lastInsertId();
        
        // Update session count
        $_SESSION['booking_count']++;
        
        // Format date and time for email
        $formatted_date = date('d M Y', strtotime($date));
        $formatted_time = date('h:i A', strtotime($time));
        
        // Send email notification
        $email_subject = "New Table Booking #" . $booking_id . " - Tea Spoon Restro";
        $email_body = "
        <h2>New Table Booking Received</h2>
        <p><strong>Booking ID:</strong> {$booking_id}</p>
        <p><strong>Customer Name:</strong> {$name}</p>
        <p><strong>Phone Number:</strong> {$phone}</p>
        <p><strong>Booking Date:</strong> {$formatted_date}</p>
        <p><strong>Booking Time:</strong> {$formatted_time}</p>
        <p><strong>Number of Guests:</strong> {$seats}</p>";
        
        if (!empty($occasion)) {
            $email_body .= "<p><strong>Special Occasion:</strong> {$occasion}</p>";
        }
        
        $email_body .= "
        <p><strong>Booked At:</strong> " . date('d M Y, h:i A') . "</p>
        <hr>
        <p><em>Please call the customer to confirm the booking.</em></p>
        ";
        
        // Send email (non-blocking - don't fail if email fails)
        try {
            sendEmail($email_subject, $email_body);
        } catch (Exception $e) {
            // Log error but don't stop the process
            error_log("Email sending failed: " . $e->getMessage());
        }
        
        // Success response
        jsonResponse(
            true, 
            "Table booked successfully! Booking ID: #{$booking_id}. We'll call you to confirm your reservation. See you on {$formatted_date} at {$formatted_time}!",
            ['booking_id' => $booking_id]
        );
        
    } else {
        jsonResponse(false, 'Failed to book table. Please try again or call us.');
    }
    
} catch (PDOException $e) {
    if (DEBUG_MODE) {
        jsonResponse(false, 'Database Error: ' . $e->getMessage());
    } else {
        jsonResponse(false, 'An error occurred. Please call us at +91 80066 77660');
    }
}
