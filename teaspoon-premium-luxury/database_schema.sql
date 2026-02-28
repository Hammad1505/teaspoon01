-- ============================================================
-- Tea Spoon Restro & Cafe - Database Schema
-- MySQL Database Setup
-- ============================================================

-- Create database (if not exists)
CREATE DATABASE IF NOT EXISTS teaspoon_restaurant 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Use the database
USE teaspoon_restaurant;

-- ============================================================
-- Table: orders
-- Stores all food order submissions
-- ============================================================

CREATE TABLE IF NOT EXISTS `orders` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `customer_name` VARCHAR(100) NOT NULL,
    `customer_phone` VARCHAR(15) NOT NULL,
    `order_items` TEXT NOT NULL,
    `delivery_address` TEXT NULL,
    `order_status` ENUM('pending', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
    `created_at` DATETIME NOT NULL,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_customer_phone` (`customer_phone`),
    INDEX `idx_order_status` (`order_status`),
    INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: seat_bookings
-- Stores all table/seat reservation submissions
-- ============================================================

CREATE TABLE IF NOT EXISTS `seat_bookings` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `customer_name` VARCHAR(100) NOT NULL,
    `customer_phone` VARCHAR(15) NOT NULL,
    `booking_date` DATE NOT NULL,
    `booking_time` TIME NOT NULL,
    `number_of_seats` INT(2) NOT NULL,
    `special_notes` TEXT NULL,
    `booking_status` ENUM('confirmed', 'completed', 'cancelled') NOT NULL DEFAULT 'confirmed',
    `created_at` DATETIME NOT NULL,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX `idx_customer_phone` (`customer_phone`),
    INDEX `idx_booking_date` (`booking_date`),
    INDEX `idx_booking_status` (`booking_status`),
    INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Sample Data (Optional - for testing)
-- Uncomment the sections below to insert sample data
-- ============================================================

-- Sample Orders
-- INSERT INTO `orders` (`customer_name`, `customer_phone`, `order_items`, `delivery_address`, `order_status`, `created_at`) VALUES
-- ('Rahul Sharma', '9876543210', '2x Paneer Butter Masala\n1x Stuffed Paratha\n1x Lassi', '123 Main Street, Bareilly', 'pending', NOW()),
-- ('Priya Gupta', '8765432109', '1x Kadai Paneer\n2x Naan\n1x Veg Platter', '', 'completed', NOW() - INTERVAL 1 DAY),
-- ('Amit Kumar', '7654321098', '3x Mixed Paratha\n2x Tea\n1x Pakora', '45 Park Road, Bareilly', 'pending', NOW());

-- Sample Bookings
-- INSERT INTO `seat_bookings` (`customer_name`, `customer_phone`, `booking_date`, `booking_time`, `number_of_seats`, `special_notes`, `booking_status`, `created_at`) VALUES
-- ('Neha Singh', '9988776655', CURDATE(), '19:00:00', 4, 'Window seat preferred', 'confirmed', NOW()),
-- ('Vikram Patel', '8877665544', CURDATE() + INTERVAL 1 DAY, '20:30:00', 2, '', 'confirmed', NOW()),
-- ('Anjali Verma', '7766554433', CURDATE() + INTERVAL 2 DAY, '18:00:00', 6, 'Birthday celebration', 'confirmed', NOW());

-- ============================================================
-- Database Maintenance Queries
-- ============================================================

-- View all pending orders
-- SELECT * FROM orders WHERE order_status = 'pending' ORDER BY created_at DESC;

-- View today's bookings
-- SELECT * FROM seat_bookings WHERE booking_date = CURDATE() ORDER BY booking_time ASC;

-- View upcoming bookings
-- SELECT * FROM seat_bookings WHERE booking_date >= CURDATE() AND booking_status = 'confirmed' ORDER BY booking_date, booking_time;

-- Count orders by status
-- SELECT order_status, COUNT(*) as count FROM orders GROUP BY order_status;

-- Count bookings by status
-- SELECT booking_status, COUNT(*) as count FROM seat_bookings GROUP BY booking_status;

-- Delete old cancelled orders (older than 30 days)
-- DELETE FROM orders WHERE order_status = 'cancelled' AND created_at < NOW() - INTERVAL 30 DAY;

-- Delete old completed bookings (older than 30 days)
-- DELETE FROM seat_bookings WHERE booking_status = 'completed' AND booking_date < CURDATE() - INTERVAL 30 DAY;

-- ============================================================
-- Backup and Restore Commands
-- ============================================================

-- Backup database:
-- mysqldump -u username -p teaspoon_restaurant > backup_teaspoon_restaurant.sql

-- Restore database:
-- mysql -u username -p teaspoon_restaurant < backup_teaspoon_restaurant.sql

-- ============================================================
-- Security Notes
-- ============================================================

-- 1. Always use prepared statements in PHP to prevent SQL injection
-- 2. Regularly backup your database
-- 3. Set up proper user permissions (don't use root user in production)
-- 4. Enable MySQL slow query log to identify performance issues
-- 5. Implement data retention policy (automatically delete old records)

-- ============================================================
-- Performance Optimization
-- ============================================================

-- Analyze table performance
-- ANALYZE TABLE orders, seat_bookings;

-- Optimize tables
-- OPTIMIZE TABLE orders, seat_bookings;

-- Check table status
-- SHOW TABLE STATUS WHERE Name IN ('orders', 'seat_bookings');

-- ============================================================
-- End of Schema
-- ============================================================
