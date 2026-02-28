<?php
/**
 * Process Online Food Order
 * Handles AJAX requests for food ordering
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
$items = isset($_POST['items']) ? $_POST['items'] : [];
$notes = isset($_POST['notes']) ? sanitizeInput($_POST['notes']) : '';

// Validation
$errors = [];

if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Please enter a valid name';
}

if (empty($phone) || !validatePhone($phone)) {
    $errors[] = 'Please enter a valid 10-digit phone number';
}

if (empty($items) || !is_array($items)) {
    $errors[] = 'Please select at least one item';
}

// If there are validation errors, return them
if (!empty($errors)) {
    jsonResponse(false, implode('. ', $errors));
}

// Sanitize items array
$items = array_map('sanitizeInput', $items);
$items_string = implode(', ', $items);

// Basic spam protection - check session
if (!isset($_SESSION['order_count'])) {
    $_SESSION['order_count'] = 0;
    $_SESSION['order_time'] = time();
}

// Limit to 3 orders per session within 1 hour
if ($_SESSION['order_count'] >= 3 && (time() - $_SESSION['order_time']) < 3600) {
    jsonResponse(false, 'Too many orders in a short time. Please call us instead at +91 80066 77660');
}

try {
    $db = getDB();
    
    // Prepare SQL statement
    $sql = "INSERT INTO orders (customer_name, customer_phone, items, notes, order_date, status) 
            VALUES (:name, :phone, :items, :notes, NOW(), 'pending')";
    
    $stmt = $db->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':items', $items_string, PDO::PARAM_STR);
    $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
    
    // Execute query
    if ($stmt->execute()) {
        $order_id = $db->lastInsertId();
        
        // Update session count
        $_SESSION['order_count']++;
        
        // Send email notification
        $email_subject = "New Food Order #" . $order_id . " - Tea Spoon Restro";
        $email_body = "
        <h2>New Food Order Received</h2>
        <p><strong>Order ID:</strong> {$order_id}</p>
        <p><strong>Customer Name:</strong> {$name}</p>
        <p><strong>Phone Number:</strong> {$phone}</p>
        <p><strong>Items Ordered:</strong></p>
        <ul>";
        
        foreach ($items as $item) {
            $email_body .= "<li>{$item}</li>";
        }
        
        $email_body .= "</ul>";
        
        if (!empty($notes)) {
            $email_body .= "<p><strong>Special Instructions:</strong> {$notes}</p>";
        }
        
        $email_body .= "
        <p><strong>Order Time:</strong> " . date('d M Y, h:i A') . "</p>
        <hr>
        <p><em>Please call the customer to confirm the order.</em></p>
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
            "Order placed successfully! Order ID: #{$order_id}. We'll call you shortly to confirm. Thank you!",
            ['order_id' => $order_id]
        );
        
    } else {
        jsonResponse(false, 'Failed to place order. Please try again or call us.');
    }
    
} catch (PDOException $e) {
    if (DEBUG_MODE) {
        jsonResponse(false, 'Database Error: ' . $e->getMessage());
    } else {
        jsonResponse(false, 'An error occurred. Please call us at +91 80066 77660');
    }
}
