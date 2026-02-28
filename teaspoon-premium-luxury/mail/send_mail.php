<?php
/**
 * Email Sending Utility using PHPMailer
 * 
 * INSTALLATION:
 * Download PHPMailer from: https://github.com/PHPMailer/PHPMailer
 * Or via Composer: composer require phpmailer/phpmailer
 * 
 * Place PHPMailer files in this directory or install via Composer
 */

// Attempt to load PHPMailer
$phpmailer_loaded = false;

// Try Composer autoload first
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
    $phpmailer_loaded = true;
}
// Try manual include
elseif (file_exists(__DIR__ . '/PHPMailer/PHPMailer.php')) {
    require __DIR__ . '/PHPMailer/PHPMailer.php';
    require __DIR__ . '/PHPMailer/SMTP.php';
    require __DIR__ . '/PHPMailer/Exception.php';
    $phpmailer_loaded = true;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Email Configuration
 * UPDATE THESE SETTINGS WITH YOUR ACTUAL SMTP CREDENTIALS
 */
define('SMTP_HOST', 'smtp.hostinger.com');        // For Hostinger
define('SMTP_PORT', 587);                         // 587 for TLS, 465 for SSL
define('SMTP_SECURE', 'tls');                     // 'tls' or 'ssl'
define('SMTP_USERNAME', 'orders@yourdomain.com'); // Your email address
define('SMTP_PASSWORD', 'your_email_password');   // Your email password
define('MAIL_FROM_EMAIL', 'orders@yourdomain.com');
define('MAIL_FROM_NAME', 'Tea Spoon Restro & Cafe');
define('MAIL_TO_EMAIL', 'owner@yourdomain.com');  // Restaurant owner email
define('MAIL_TO_NAME', 'Tea Spoon Management');

/**
 * Alternative SMTP Configurations:
 * 
 * GMAIL (Less secure app access must be enabled):
 * SMTP_HOST: smtp.gmail.com
 * SMTP_PORT: 587
 * SMTP_SECURE: tls
 * SMTP_USERNAME: your-gmail@gmail.com
 * SMTP_PASSWORD: your-app-password (use App Password, not regular password)
 * 
 * ZOHO:
 * SMTP_HOST: smtp.zoho.com
 * SMTP_PORT: 587
 * SMTP_SECURE: tls
 * 
 * OUTLOOK/HOTMAIL:
 * SMTP_HOST: smtp-mail.outlook.com
 * SMTP_PORT: 587
 * SMTP_SECURE: tls
 * 
 * HOSTINGER (Recommended for Hostinger hosting):
 * SMTP_HOST: smtp.hostinger.com
 * SMTP_PORT: 587
 * SMTP_SECURE: tls
 */

/**
 * Send Email Function
 * 
 * @param string $subject Email subject
 * @param string $body Email body (HTML)
 * @param string $to_email Optional recipient email (defaults to owner email)
 * @param string $to_name Optional recipient name
 * @return bool True on success, false on failure
 */
function sendEmail($subject, $body, $to_email = null, $to_name = null) {
    global $phpmailer_loaded;
    
    // If PHPMailer is not loaded, log error and return false
    if (!$phpmailer_loaded) {
        error_log("PHPMailer not found. Please install it via Composer or download manually.");
        return false;
    }
    
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        if (DEBUG_MODE) {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        } else {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
        }
        
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USERNAME;
        $mail->Password   = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port       = SMTP_PORT;
        $mail->CharSet    = 'UTF-8';
        
        // Recipients
        $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
        $mail->addAddress(
            $to_email ?? MAIL_TO_EMAIL, 
            $to_name ?? MAIL_TO_NAME
        );
        
        // Optional: Add reply-to
        $mail->addReplyTo(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = getEmailTemplate($body);
        $mail->AltBody = strip_tags($body); // Plain text version
        
        // Send email
        $mail->send();
        return true;
        
    } catch (Exception $e) {
        error_log("Email sending failed: {$mail->ErrorInfo}");
        return false;
    }
}

/**
 * Email Template Wrapper
 * 
 * @param string $content Email content
 * @return string Formatted HTML email
 */
function getEmailTemplate($content) {
    return '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tea Spoon Restro & Cafe</title>
        <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                line-height: 1.6;
                color: #333;
                max-width: 600px;
                margin: 0 auto;
                padding: 0;
                background-color: #f4f4f4;
            }
            .email-container {
                background-color: #ffffff;
                margin: 20px auto;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }
            .email-header {
                background: linear-gradient(135deg, #C17817, #8B5A10);
                color: #ffffff;
                padding: 30px;
                text-align: center;
            }
            .email-header h1 {
                margin: 0;
                font-size: 28px;
                font-weight: 700;
            }
            .email-body {
                padding: 30px;
            }
            .email-body h2 {
                color: #C17817;
                margin-top: 0;
            }
            .email-body p {
                margin: 10px 0;
            }
            .email-body ul {
                margin: 10px 0;
                padding-left: 20px;
            }
            .email-footer {
                background-color: #f8f8f8;
                padding: 20px;
                text-align: center;
                font-size: 14px;
                color: #666;
                border-top: 1px solid #e0e0e0;
            }
            .button {
                display: inline-block;
                padding: 12px 30px;
                background-color: #C17817;
                color: #ffffff;
                text-decoration: none;
                border-radius: 5px;
                margin: 15px 0;
            }
            hr {
                border: none;
                border-top: 1px solid #e0e0e0;
                margin: 20px 0;
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <div class="email-header">
                <h1>🍵 Tea Spoon Restro & Cafe</h1>
            </div>
            <div class="email-body">
                ' . $content . '
            </div>
            <div class="email-footer">
                <p><strong>Tea Spoon Restro & Cafe</strong></p>
                <p>P3, 2, Opposite Gangasheel Hospital, Deen Dayal Puram, Bareilly, UP 243122</p>
                <p>Phone: +91 80066 77660 | Open Daily: 11:00 AM – 11:15 PM</p>
                <p style="font-size: 12px; margin-top: 15px;">
                    This is an automated notification from your restaurant website.
                </p>
            </div>
        </div>
    </body>
    </html>
    ';
}

/**
 * Send Test Email
 * Use this function to test your email configuration
 */
function sendTestEmail() {
    $subject = "Test Email - Tea Spoon Restro";
    $body = "
    <h2>Email Configuration Test</h2>
    <p>If you receive this email, your SMTP configuration is working correctly!</p>
    <p><strong>Test Time:</strong> " . date('d M Y, h:i A') . "</p>
    ";
    
    return sendEmail($subject, $body);
}
