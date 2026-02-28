<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Tea Spoon Restro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #d97706;
            --primary-dark: #b45309;
            --secondary: #7c2d12;
            --accent: #fbbf24;
        }
        
        body {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary-dark) 50%, #1c1917 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(217, 119, 6, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(251, 191, 36, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }
        
        .admin-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            max-width: 500px;
            width: 100%;
            position: relative;
            z-index: 1;
            border: 2px solid rgba(217, 119, 6, 0.2);
        }
        
        .admin-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .admin-icon {
            font-size: 64px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
        }
        
        .admin-header h1 {
            color: var(--secondary);
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .admin-header p {
            color: #78716c;
            font-size: 16px;
        }
        
        .btn-admin-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 16px 40px;
            border-radius: 30px;
            border: none;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(217, 119, 6, 0.3);
        }
        
        .btn-admin-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(217, 119, 6, 0.5);
            color: white;
        }
        
        .back-link {
            text-align: center;
            margin-top: 30px;
        }
        
        .back-link a {
            color: var(--primary);
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .back-link a:hover {
            color: var(--primary-dark);
        }
        
        .info-box {
            background: #fef9ec;
            border: 2px solid #fef3c7;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .info-box h5 {
            color: var(--secondary);
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .info-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .info-box li {
            color: #78716c;
            font-size: 14px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-box i {
            color: var(--primary);
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <div class="admin-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1>Admin Panel</h1>
            <p>Tea Spoon Restro & Cafe</p>
        </div>

        <div class="info-box">
            <h5><i class="fas fa-info-circle"></i> Admin Access</h5>
            <ul>
                <li><i class="fas fa-check-circle"></i> Manage food orders</li>
                <li><i class="fas fa-check-circle"></i> View table bookings</li>
                <li><i class="fas fa-check-circle"></i> Update order status</li>
                <li><i class="fas fa-check-circle"></i> Manage reservations</li>
            </ul>
        </div>

        <a href="login.php" class="btn btn-admin-login">
            <i class="fas fa-sign-in-alt"></i> Login to Admin Panel
        </a>

        <div class="back-link">
            <a href="../index.php">
                <i class="fas fa-arrow-left"></i> Back to Main Website
            </a>
        </div>
    </div>
</body>
</html>
