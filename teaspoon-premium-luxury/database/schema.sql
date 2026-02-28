-- ========================================================
-- Tea Spoon Restro and Cafe - Database Schema
-- MySQL Database Setup for Restaurant Website
-- ========================================================

-- Create Database
CREATE DATABASE IF NOT EXISTS teaspoon_db 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE teaspoon_db;

-- ========================================================
-- Table: orders
-- Stores online food orders from customers
-- ========================================================
CREATE TABLE IF NOT EXISTS orders (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    customer_phone VARCHAR(15) NOT NULL,
    items TEXT NOT NULL,
    notes TEXT DEFAULT NULL,
    order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_order_date (order_date),
    INDEX idx_status (status),
    INDEX idx_phone (customer_phone)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Table: seat_bookings
-- Stores table/seat reservations from customers
-- ========================================================
CREATE TABLE IF NOT EXISTS seat_bookings (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    customer_phone VARCHAR(15) NOT NULL,
    booking_date DATE NOT NULL,
    booking_time TIME NOT NULL,
    number_of_seats VARCHAR(10) NOT NULL,
    occasion VARCHAR(100) DEFAULT NULL,
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_booking_date (booking_date),
    INDEX idx_status (status),
    INDEX idx_phone (customer_phone),
    UNIQUE KEY unique_booking (customer_phone, booking_date, booking_time)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========================================================
-- Insert Sample Data (Optional - for testing)
-- ========================================================

-- Sample Orders
INSERT INTO orders (customer_name, customer_phone, items, notes, status) VALUES
('Rajesh Kumar', '9876543210', 'Paneer Butter Masala, Mixed Parathas', 'Extra spicy please', 'confirmed'),
('Priya Sharma', '9123456789', 'Kadai Paneer, Veg Platter, Beverages', 'Less oil', 'pending'),
('Amit Singh', '9988776655', 'Wraps & Rolls, Beverages', NULL, 'completed');

-- Sample Bookings
INSERT INTO seat_bookings (customer_name, customer_phone, booking_date, booking_time, number_of_seats, occasion, status) VALUES
('Neha Gupta', '9234567890', '2025-02-15', '19:30:00', '4', 'Birthday celebration', 'confirmed'),
('Vikram Mehta', '9345678901', '2025-02-16', '20:00:00', '6', 'Family dinner', 'pending'),
('Anjali Verma', '9456789012', '2025-02-17', '18:00:00', '2', NULL, 'confirmed');

-- ========================================================
-- Database User Setup (For Production)
-- ========================================================

-- Create a dedicated database user for the application
-- IMPORTANT: Change 'your_secure_password' to a strong password

-- For local development:
-- CREATE USER 'teaspoon_user'@'localhost' IDENTIFIED BY 'your_secure_password';
-- GRANT ALL PRIVILEGES ON teaspoon_db.* TO 'teaspoon_user'@'localhost';

-- For production (remote access):
-- CREATE USER 'teaspoon_user'@'%' IDENTIFIED BY 'your_secure_password';
-- GRANT SELECT, INSERT, UPDATE, DELETE ON teaspoon_db.* TO 'teaspoon_user'@'%';

-- Apply privilege changes
-- FLUSH PRIVILEGES;

-- ========================================================
-- Useful Queries for Admin
-- ========================================================

-- View all pending orders
-- SELECT * FROM orders WHERE status = 'pending' ORDER BY order_date DESC;

-- View all confirmed bookings for today
-- SELECT * FROM seat_bookings WHERE booking_date = CURDATE() AND status = 'confirmed';

-- Count orders by status
-- SELECT status, COUNT(*) as count FROM orders GROUP BY status;

-- Get today's bookings
-- SELECT * FROM seat_bookings WHERE booking_date = CURDATE() ORDER BY booking_time;

-- Search orders by phone number
-- SELECT * FROM orders WHERE customer_phone = '9876543210';

-- Get revenue statistics (if you add a price column later)
-- SELECT DATE(order_date) as date, COUNT(*) as orders FROM orders GROUP BY DATE(order_date);

-- ========================================================
-- Backup Command (Run from command line)
-- ========================================================
-- mysqldump -u teaspoon_user -p teaspoon_db > backup_$(date +%Y%m%d).sql

-- ========================================================
-- Restore Command (Run from command line)
-- ========================================================
-- mysql -u teaspoon_user -p teaspoon_db < backup_20250210.sql

-- ========================================================
-- Database Optimization
-- ========================================================

-- Analyze tables for optimization
-- ANALYZE TABLE orders, seat_bookings;

-- Check table status
-- SHOW TABLE STATUS FROM teaspoon_db;

-- ========================================================
-- End of Database Schema
-- ========================================================
