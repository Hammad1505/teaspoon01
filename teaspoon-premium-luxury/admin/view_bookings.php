<?php
/**
 * Admin - View All Bookings
 */
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../config/db.php';

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $booking_id = (int)$_POST['booking_id'];
    $new_status = $_POST['status'];
    
    try {
        $db = getDB();
        $stmt = $db->prepare("UPDATE seat_bookings SET status = :status WHERE id = :id");
        $stmt->execute(['status' => $new_status, 'id' => $booking_id]);
        $success_message = "Booking status updated successfully!";
    } catch (PDOException $e) {
        $error_message = "Error updating status: " . $e->getMessage();
    }
}

// Get all bookings
try {
    $db = getDB();
    $stmt = $db->query("SELECT * FROM seat_bookings ORDER BY booking_date DESC, booking_time DESC");
    $bookings = $stmt->fetchAll();
} catch (PDOException $e) {
    $error_message = "Error fetching bookings: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookings - Tea Spoon Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #C17817, #8B5A10);
        }
        .navbar-brand {
            color: white !important;
            font-weight: 700;
        }
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .badge-pending { background-color: #f39c12; }
        .badge-confirmed { background-color: #27ae60; }
        .badge-completed { background-color: #3498db; }
        .badge-cancelled { background-color: #e74c3c; }
        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid rgba(255,255,255,0.3);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark mb-4">
        <div class="container-fluid">
            <span class="navbar-brand">
                <i class="fas fa-calendar-check"></i> All Bookings
            </span>
            <div>
                <a href="dashboard.php" class="btn btn-logout btn-sm me-2">
                    <i class="fas fa-arrow-left"></i> Dashboard
                </a>
                <a href="logout.php" class="btn btn-logout btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <?php if (isset($success_message)): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?php echo $success_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?php echo $error_message; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php endif; ?>

        <div class="content-card">
            <h2 class="mb-4">
                <i class="fas fa-list text-danger"></i> All Table Bookings
                <span class="badge bg-danger"><?php echo count($bookings); ?> Total</span>
            </h2>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                            <th>Guests</th>
                            <th>Occasion</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($bookings)): ?>
                        <tr>
                            <td colspan="10" class="text-center py-5 text-muted">
                                <i class="fas fa-calendar-times fa-3x mb-3"></i><br>
                                No bookings received yet
                            </td>
                        </tr>
                        <?php else: ?>
                            <?php foreach ($bookings as $booking): ?>
                            <tr>
                                <td><strong>#<?php echo $booking['id']; ?></strong></td>
                                <td><?php echo htmlspecialchars($booking['customer_name']); ?></td>
                                <td>
                                    <a href="tel:<?php echo $booking['customer_phone']; ?>" class="text-decoration-none">
                                        <i class="fas fa-phone"></i> <?php echo htmlspecialchars($booking['customer_phone']); ?>
                                    </a>
                                </td>
                                <td><?php echo date('d M Y', strtotime($booking['booking_date'])); ?></td>
                                <td><?php echo date('h:i A', strtotime($booking['booking_time'])); ?></td>
                                <td>
                                    <span class="badge bg-info"><?php echo htmlspecialchars($booking['number_of_seats']); ?></span>
                                </td>
                                <td>
                                    <?php echo !empty($booking['occasion']) ? htmlspecialchars($booking['occasion']) : '<em class="text-muted">None</em>'; ?>
                                </td>
                                <td>
                                    <small><?php echo date('d M Y, h:i A', strtotime($booking['created_at'])); ?></small>
                                </td>
                                <td>
                                    <span class="badge badge-<?php echo $booking['status']; ?>">
                                        <?php echo ucfirst($booking['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: 130px;">
                                            <option value="pending" <?php echo $booking['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="confirmed" <?php echo $booking['status'] === 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                                            <option value="completed" <?php echo $booking['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                            <option value="cancelled" <?php echo $booking['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                        </select>
                                        <input type="hidden" name="update_status" value="1">
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
