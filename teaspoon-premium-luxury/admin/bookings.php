<?php
/**
 * Tea Spoon Restro & Cafe - Admin Bookings Management
 */

require_once '../config/db.php';
startSecureSession();

if (!isAdmin()) {
    redirect('login.php');
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $bookingId = intval($_POST['booking_id']);
    $newStatus = sanitizeInput($_POST['status']);
    
    $conn = getDBConnection();
    if ($conn) {
        $stmt = $conn->prepare("UPDATE seat_bookings SET booking_status = ? WHERE id = ?");
        $stmt->bind_param("si", $newStatus, $bookingId);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
        $_SESSION['success_message'] = "Booking status updated successfully";
        redirect('bookings.php');
    }
}

// Fetch bookings
$conn = getDBConnection();
$bookings = [];

if ($conn) {
    $result = $conn->query("SELECT * FROM seat_bookings ORDER BY booking_date DESC, booking_time DESC");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row;
        }
    }
}

$successMessage = $_SESSION['success_message'] ?? '';
unset($_SESSION['success_message']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings Management - Tea Spoon Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Karla:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #D4691E;
            --secondary-color: #2C3E50;
            --font-display: 'Playfair Display', serif;
            --font-body: 'Karla', sans-serif;
        }
        
        body {
            font-family: var(--font-body);
            background: #f5f5f5;
        }
        
        .navbar {
            background: var(--secondary-color);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-family: var(--font-display);
            font-size: 24px;
            color: #ffffff !important;
            font-weight: 700;
        }
        
        .btn-logout {
            background: var(--primary-color);
            color: #ffffff;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
        }
        
        .page-title {
            font-family: var(--font-display);
            font-size: 32px;
            color: var(--secondary-color);
            margin-bottom: 30px;
            font-weight: 700;
        }
        
        .bookings-table {
            background: #ffffff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        
        .table th {
            background: var(--secondary-color);
            color: #ffffff;
            font-weight: 600;
            border: none;
            padding: 15px;
        }
        
        .table td {
            padding: 15px;
            vertical-align: middle;
        }
        
        .badge {
            padding: 6px 12px;
            border-radius: 5px;
            font-weight: 600;
        }
        
        .badge-confirmed {
            background: #28a745;
            color: #fff;
        }
        
        .badge-completed {
            background: #6c757d;
            color: #fff;
        }
        
        .badge-cancelled {
            background: #dc3545;
            color: #fff;
        }
        
        .btn-action {
            padding: 5px 15px;
            font-size: 14px;
            margin: 2px;
        }
        
        .booking-today {
            background-color: #fff8e1 !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <i class="fas fa-utensils"></i> Tea Spoon Admin
            </a>
            <div>
                <a href="dashboard.php" class="btn btn-outline-light me-2">
                    <i class="fas fa-arrow-left"></i> Dashboard
                </a>
                <a href="?logout=1" class="btn btn-logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid" style="padding: 30px;">
        <h1 class="page-title">Bookings Management</h1>
        
        <?php if ($successMessage): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> <?php echo $successMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <div class="bookings-table">
            <?php if (empty($bookings)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No bookings yet</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Seats</th>
                                <th>Special Notes</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $today = date('Y-m-d');
                            foreach ($bookings as $booking): 
                                $isToday = ($booking['booking_date'] === $today);
                            ?>
                                <tr class="<?php echo $isToday ? 'booking-today' : ''; ?>">
                                    <td><strong>#<?php echo $booking['id']; ?></strong></td>
                                    <td><?php echo htmlspecialchars($booking['customer_name']); ?></td>
                                    <td>
                                        <a href="tel:+91<?php echo $booking['customer_phone']; ?>" class="text-decoration-none">
                                            <i class="fas fa-phone"></i> +91 <?php echo $booking['customer_phone']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php 
                                        $date = date('d M Y', strtotime($booking['booking_date']));
                                        echo $date;
                                        if ($isToday) {
                                            echo ' <span class="badge bg-warning text-dark">Today</span>';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo date('h:i A', strtotime($booking['booking_time'])); ?></td>
                                    <td>
                                        <strong><?php echo $booking['number_of_seats']; ?></strong> 
                                        <?php echo $booking['number_of_seats'] == 1 ? 'person' : 'people'; ?>
                                    </td>
                                    <td style="max-width: 200px; font-size: 14px;">
                                        <?php 
                                        if (!empty($booking['special_notes'])) {
                                            echo htmlspecialchars($booking['special_notes']);
                                        } else {
                                            echo '<em class="text-muted">None</em>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?php echo $booking['booking_status']; ?>">
                                            <?php echo ucfirst($booking['booking_status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($booking['booking_status'] === 'confirmed'): ?>
                                            <form method="POST" style="display: inline;">
                                                <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" name="update_status" class="btn btn-secondary btn-sm btn-action">
                                                    <i class="fas fa-check"></i> Complete
                                                </button>
                                            </form>
                                            <form method="POST" style="display: inline;">
                                                <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                                <input type="hidden" name="status" value="cancelled">
                                                <button type="submit" name="update_status" class="btn btn-danger btn-sm btn-action">
                                                    <i class="fas fa-times"></i> Cancel
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if ($conn) {
    $conn->close();
}
?>
