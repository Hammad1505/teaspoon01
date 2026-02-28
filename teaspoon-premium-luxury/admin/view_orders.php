<?php
/**
 * Admin - View All Orders
 */
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/../config/db.php';

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $order_id = (int)$_POST['order_id'];
    $new_status = $_POST['status'];
    
    try {
        $db = getDB();
        $stmt = $db->prepare("UPDATE orders SET status = :status WHERE id = :id");
        $stmt->execute(['status' => $new_status, 'id' => $order_id]);
        $success_message = "Order status updated successfully!";
    } catch (PDOException $e) {
        $error_message = "Error updating status: " . $e->getMessage();
    }
}

// Get all orders
try {
    $db = getDB();
    $stmt = $db->query("SELECT * FROM orders ORDER BY order_date DESC");
    $orders = $stmt->fetchAll();
} catch (PDOException $e) {
    $error_message = "Error fetching orders: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders - Tea Spoon Admin</title>
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
        .order-details {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark mb-4">
        <div class="container-fluid">
            <span class="navbar-brand">
                <i class="fas fa-shopping-bag"></i> All Orders
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
                <i class="fas fa-list text-primary"></i> All Food Orders
                <span class="badge bg-primary"><?php echo count($orders); ?> Total</span>
            </h2>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Items Ordered</th>
                            <th>Notes</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3"></i><br>
                                No orders received yet
                            </td>
                        </tr>
                        <?php else: ?>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><strong>#<?php echo $order['id']; ?></strong></td>
                                <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                <td>
                                    <a href="tel:<?php echo $order['customer_phone']; ?>" class="text-decoration-none">
                                        <i class="fas fa-phone"></i> <?php echo htmlspecialchars($order['customer_phone']); ?>
                                    </a>
                                </td>
                                <td class="order-details"><?php echo htmlspecialchars($order['items']); ?></td>
                                <td class="order-details">
                                    <?php echo !empty($order['notes']) ? htmlspecialchars($order['notes']) : '<em class="text-muted">None</em>'; ?>
                                </td>
                                <td><?php echo date('d M Y, h:i A', strtotime($order['order_date'])); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo $order['status']; ?>">
                                        <?php echo ucfirst($order['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: 130px;">
                                            <option value="pending" <?php echo $order['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="confirmed" <?php echo $order['status'] === 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                                            <option value="completed" <?php echo $order['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                            <option value="cancelled" <?php echo $order['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
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
