<?php
/**
 * Tea Spoon Restro & Cafe - Admin Orders Management
 */

require_once '../config/db.php';
startSecureSession();

if (!isAdmin()) {
    redirect('login.php');
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $orderId = intval($_POST['order_id']);
    $newStatus = sanitizeInput($_POST['status']);
    
    $conn = getDBConnection();
    if ($conn) {
        $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE id = ?");
        $stmt->bind_param("si", $newStatus, $orderId);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
        $_SESSION['success_message'] = "Order status updated successfully";
        redirect('orders.php');
    }
}

// Fetch orders
$conn = getDBConnection();
$orders = [];

if ($conn) {
    $result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
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
    <title>Orders Management - Tea Spoon Admin</title>
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
        
        .orders-table {
            background: #ffffff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        
        .table {
            margin: 0;
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
        
        .badge-pending {
            background: #ffc107;
            color: #000;
        }
        
        .badge-completed {
            background: #28a745;
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
        <h1 class="page-title">Orders Management</h1>
        
        <?php if ($successMessage): ?>
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> <?php echo $successMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <div class="orders-table">
            <?php if (empty($orders)): ?>
                <div class="text-center py-5">
                    <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No orders yet</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer</th>
                                <th>Phone</th>
                                <th>Items</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><strong>#<?php echo $order['id']; ?></strong></td>
                                    <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                    <td>
                                        <a href="tel:+91<?php echo $order['customer_phone']; ?>" class="text-decoration-none">
                                            <i class="fas fa-phone"></i> +91 <?php echo $order['customer_phone']; ?>
                                        </a>
                                    </td>
                                    <td style="max-width: 300px; white-space: pre-wrap; font-size: 14px;">
                                        <?php echo htmlspecialchars($order['order_items']); ?>
                                    </td>
                                    <td style="max-width: 200px; font-size: 14px;">
                                        <?php echo !empty($order['delivery_address']) ? htmlspecialchars($order['delivery_address']) : '<em>Dine-in/Pickup</em>'; ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?php echo $order['order_status']; ?>">
                                            <?php echo ucfirst($order['order_status']); ?>
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;">
                                        <?php echo date('d M Y', strtotime($order['created_at'])); ?><br>
                                        <small class="text-muted"><?php echo date('h:i A', strtotime($order['created_at'])); ?></small>
                                    </td>
                                    <td>
                                        <?php if ($order['order_status'] === 'pending'): ?>
                                            <form method="POST" style="display: inline;">
                                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                                <input type="hidden" name="status" value="completed">
                                                <button type="submit" name="update_status" class="btn btn-success btn-sm btn-action">
                                                    <i class="fas fa-check"></i> Complete
                                                </button>
                                            </form>
                                            <form method="POST" style="display: inline;">
                                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
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
