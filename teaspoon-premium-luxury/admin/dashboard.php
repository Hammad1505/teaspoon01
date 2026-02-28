<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once __DIR__ . '/../config/db.php';

try {
    $db = getDB();
    $total_orders = $db->query("SELECT COUNT(*) as total FROM orders")->fetch()['total'];
    $pending_orders = $db->query("SELECT COUNT(*) as total FROM orders WHERE status = 'pending'")->fetch()['total'];
    $total_bookings = $db->query("SELECT COUNT(*) as total FROM seat_bookings")->fetch()['total'];
    $pending_bookings = $db->query("SELECT COUNT(*) as total FROM seat_bookings WHERE status = 'pending'")->fetch()['total'];
    $recent_orders = $db->query("SELECT * FROM orders ORDER BY order_date DESC LIMIT 5")->fetchAll();
    $recent_bookings = $db->query("SELECT * FROM seat_bookings ORDER BY created_at DESC LIMIT 5")->fetchAll();
} catch (PDOException $e) {
    $error = "Database error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Tea Spoon Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #8B4513;
            --gold: #DAA520;
            --dark: #2B1810;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #FFF8DC 0%, #F5F5DC 100%);
            min-height: 100vh;
        }
        
        /* Mobile-First Navbar */
        .admin-navbar {
            background: linear-gradient(135deg, var(--primary), var(--dark));
            padding: 15px 0;
            box-shadow: 0 2px 15px rgba(139,69,19,0.3);
        }
        
        .admin-brand {
            font-family: 'Cinzel', serif;
            font-size: 20px;
            color: var(--gold);
            font-weight: 700;
        }
        
        .admin-user {
            color: rgba(255,255,255,0.9);
            font-size: 13px;
        }
        
        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 1px solid rgba(255,255,255,0.3);
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 12px;
            transition: all 0.3s;
        }
        
        .btn-logout:hover {
            background: rgba(255,255,255,0.3);
            color: white;
        }
        
        /* Mobile-Responsive Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(139,69,19,0.1);
            text-align: center;
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(139,69,19,0.2);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--gold), #C9A820);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: var(--dark);
            font-size: 26px;
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: var(--primary);
            margin: 10px 0;
        }
        
        .stat-label {
            font-size: 13px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 500;
        }
        
        /* Mobile-Responsive Tables */
        .table-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(139,69,19,0.1);
            margin-bottom: 25px;
        }
        
        .table-title {
            font-family: 'Cinzel', serif;
            font-size: 20px;
            color: var(--dark);
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        /* Mobile Table Styles */
        .table {
            font-size: 14px;
        }
        
        .table thead {
            background: linear-gradient(135deg, #FFF8DC, #F5F5DC);
        }
        
        .table th {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--dark);
            font-weight: 600;
            border: none;
            padding: 12px 8px;
        }
        
        .table td {
            padding: 12px 8px;
            vertical-align: middle;
        }
        
        .badge {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .badge-pending {
            background: #FEF3C7;
            color: #92400E;
        }
        
        .badge-confirmed {
            background: #D1FAE5;
            color: #065F46;
        }
        
        .badge-completed {
            background: #DBEAFE;
            color: #1E40AF;
        }
        
        .badge-cancelled {
            background: #FEE2E2;
            color: #991B1B;
        }
        
        .btn-view {
            background: linear-gradient(135deg, var(--gold), #C9A820);
            color: var(--dark);
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(218,165,32,0.3);
            color: var(--dark);
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .admin-brand {
                font-size: 16px;
            }
            
            .admin-user {
                display: none;
            }
            
            .btn-logout {
                padding: 6px 15px;
                font-size: 11px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            
            .stat-card {
                padding: 20px 15px;
            }
            
            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 22px;
            }
            
            .stat-number {
                font-size: 28px;
            }
            
            .stat-label {
                font-size: 11px;
            }
            
            .table-card {
                padding: 15px;
                overflow-x: auto;
            }
            
            .table-title {
                font-size: 16px;
            }
            
            .table {
                font-size: 12px;
            }
            
            .table th,
            .table td {
                padding: 10px 6px;
                white-space: nowrap;
            }
        }
        
        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile-Responsive Navbar -->
    <nav class="admin-navbar">
        <div class="container-fluid px-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="admin-brand">
                    <i class="fas fa-shield-alt me-2"></i>Admin Panel
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="admin-user d-none d-md-inline">
                        <i class="fas fa-user-circle me-1"></i><?php echo htmlspecialchars($_SESSION['admin_username']); ?>
                    </span>
                    <a href="logout.php" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt me-1"></i><span class="d-none d-sm-inline">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-3 py-4">
        <!-- Mobile-Responsive Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="stat-number"><?php echo $total_orders; ?></div>
                <div class="stat-label">Total Orders</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-number"><?php echo $total_bookings; ?></div>
                <div class="stat-label">Total Bookings</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-number"><?php echo $pending_orders; ?></div>
                <div class="stat-label">Pending Orders</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="stat-number"><?php echo $pending_bookings; ?></div>
                <div class="stat-label">Pending Bookings</div>
            </div>
        </div>

        <!-- Mobile-Responsive Tables -->
        <div class="row g-3">
            <div class="col-lg-6">
                <div class="table-card">
                    <h3 class="table-title"><i class="fas fa-shopping-bag me-2"></i>Recent Orders</h3>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($recent_orders)): ?>
                                <tr><td colspan="3" class="text-center text-muted">No orders yet</td></tr>
                                <?php else: foreach ($recent_orders as $order): ?>
                                <tr>
                                    <td><strong>#<?php echo $order['id']; ?></strong></td>
                                    <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                                    <td><span class="badge badge-<?php echo $order['status']; ?>"><?php echo ucfirst($order['status']); ?></span></td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <a href="view_orders.php" class="btn btn-view w-100"><i class="fas fa-list me-2"></i>View All Orders</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="table-card">
                    <h3 class="table-title"><i class="fas fa-calendar-check me-2"></i>Recent Bookings</h3>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($recent_bookings)): ?>
                                <tr><td colspan="3" class="text-center text-muted">No bookings yet</td></tr>
                                <?php else: foreach ($recent_bookings as $booking): ?>
                                <tr>
                                    <td><strong>#<?php echo $booking['id']; ?></strong></td>
                                    <td><?php echo htmlspecialchars($booking['customer_name']); ?></td>
                                    <td><span class="badge badge-<?php echo $booking['status']; ?>"><?php echo ucfirst($booking['status']); ?></span></td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        <a href="view_bookings.php" class="btn btn-view w-100"><i class="fas fa-list me-2"></i>View All Bookings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
