# Tea Spoon Restro and Cafe - Restaurant Website

## 🍵 Project Overview

A complete, production-ready, premium one-page restaurant website built with core PHP, MySQL, Bootstrap 5, and vanilla JavaScript. Features online food ordering, table booking system, email notifications, and an admin management panel.

**Live Demo:** [Your Domain Here]

---

## ✨ Features

### Customer-Facing Features:
- ✅ **Responsive One-Page Design** - Beautiful, mobile-first layout
- ✅ **Online Food Ordering** - AJAX-powered order form with real-time validation
- ✅ **Table Booking System** - Reserve tables with date/time selection
- ✅ **Email Notifications** - Automated emails for orders and bookings
- ✅ **WhatsApp Integration** - Direct messaging for quick orders
- ✅ **Click-to-Call** - One-tap phone calling on mobile
- ✅ **Google Maps** - Embedded location map
- ✅ **Menu Showcase** - Highlight popular dishes with images
- ✅ **Customer Reviews** - Social proof section
- ✅ **Smooth Animations** - Professional scroll animations and effects

### Admin Panel Features:
- ✅ **Secure Login System** - Password-protected admin access
- ✅ **Dashboard** - Real-time statistics and overview
- ✅ **Order Management** - View and update order status
- ✅ **Booking Management** - Manage table reservations
- ✅ **Status Updates** - Change order/booking status dynamically
- ✅ **Email Notifications** - Receive alerts for new orders/bookings

---

## 🛠️ Technology Stack

| Category | Technology |
|----------|------------|
| **Backend** | PHP 7.4+ (Core PHP, No Framework) |
| **Database** | MySQL 5.7+ / MariaDB 10.3+ |
| **Frontend** | HTML5, CSS3, Bootstrap 5.3.2 |
| **JavaScript** | Vanilla JS with AJAX |
| **Email** | PHPMailer (SMTP) |
| **Icons** | Font Awesome 6.4.0 |
| **Fonts** | Google Fonts (Playfair Display, Cormorant Garamond, Montserrat) |
| **Server** | Apache/Nginx with PHP support |

---

## 📁 Project Structure

```
tea-spoon-restaurant/
│
├── index.php                 # Main landing page
│
├── assets/
│   ├── css/
│   │   └── style.css        # Custom premium styles
│   ├── js/
│   │   └── main.js          # Custom JavaScript & AJAX
│   └── images/              # Restaurant images (add your own)
│       ├── paneer-butter-masala.jpg
│       ├── kadai-paneer.jpg
│       ├── parathas.jpg
│       ├── veg-platter.jpg
│       ├── wraps-rolls.jpg
│       ├── beverages.jpg
│       └── restaurant-interior.jpg
│
├── config/
│   └── db.php               # Database configuration & helpers
│
├── order/
│   └── process_order.php    # Handle food order submissions
│
├── booking/
│   └── process_booking.php  # Handle table booking submissions
│
├── mail/
│   ├── send_mail.php        # PHPMailer email utility
│   └── PHPMailer/           # PHPMailer library (install separately)
│
├── admin/
│   ├── login.php            # Admin login page
│   ├── dashboard.php        # Admin dashboard
│   ├── view_orders.php      # View all orders
│   ├── view_bookings.php    # View all bookings
│   └── logout.php           # Admin logout
│
├── database/
│   └── schema.sql           # MySQL database schema
│
├── DEPLOYMENT_GUIDE.md      # Complete deployment instructions
├── TESTING_CHECKLIST.md     # Comprehensive testing guide
└── README.md                # This file
```

---

## 🚀 Quick Start

### Prerequisites:
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- PHPMailer library
- Modern web browser

### Installation Steps:

1. **Clone or Download the Project**
```bash
git clone [your-repo-url]
cd tea-spoon-restaurant
```

2. **Setup Database**
- Create MySQL database: `teaspoon_db`
- Import schema: `database/schema.sql`
- Create database user with privileges

3. **Configure Database Connection**
- Edit `config/db.php`
- Update DB credentials:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'teaspoon_db');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
```

4. **Install PHPMailer**
```bash
composer require phpmailer/phpmailer
```
Or download manually from: https://github.com/PHPMailer/PHPMailer

5. **Configure Email Settings**
- Edit `mail/send_mail.php`
- Update SMTP credentials

6. **Add Restaurant Images**
- Upload images to `assets/images/`
- Recommended size: 600x400px for menu items

7. **Change Admin Password**
- Edit `admin/login.php`
- Update default credentials

8. **Deploy to Server**
- Upload all files to `public_html/`
- Set file permissions (755 for folders, 644 for files)
- Enable SSL certificate

9. **Test Everything**
- Visit your website
- Test order form
- Test booking form
- Test admin panel
- Verify email notifications

---

## 📧 Email Configuration

The system uses PHPMailer for sending email notifications. Configure in `mail/send_mail.php`:

### For Hostinger:
```php
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');
```

### For Gmail:
```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');
// Use App Password, not regular password
```

### For Others:
Check your email provider's SMTP documentation.

---

## 🔐 Default Admin Credentials

**⚠️ CHANGE THESE IMMEDIATELY AFTER DEPLOYMENT!**

```
Username: admin
Password: teaspoon@2024
```

Change in: `admin/login.php`

---

## 📊 Database Schema

### Tables:

**orders**
- Stores online food orders
- Fields: id, customer_name, customer_phone, items, notes, order_date, status

**seat_bookings**
- Stores table reservations
- Fields: id, customer_name, customer_phone, booking_date, booking_time, number_of_seats, occasion, status

Both tables include:
- Auto-increment IDs
- Timestamps (created_at, updated_at)
- Status tracking (pending, confirmed, completed, cancelled)
- Proper indexing for performance

---

## 🎨 Design Features

### Premium UI/UX:
- ✨ Warm color palette (browns, golds) matching restaurant theme
- ✨ Distinctive typography (Playfair Display, Cormorant Garamond)
- ✨ Smooth scroll animations
- ✨ Hover effects and micro-interactions
- ✨ Professional gradient overlays
- ✨ Custom scrollbar and mouse indicators
- ✨ Responsive grid system
- ✨ Mobile-optimized touch targets

### Responsive Breakpoints:
- Desktop: 1920px+
- Laptop: 1366px
- Tablet: 768px
- Mobile: 375px

---

## 🔒 Security Features

- ✅ **SQL Injection Protection** - PDO prepared statements
- ✅ **XSS Protection** - Input sanitization with htmlspecialchars
- ✅ **CSRF Protection** - Session validation
- ✅ **Password Protection** - Admin panel login required
- ✅ **Input Validation** - Client-side and server-side
- ✅ **Spam Protection** - Rate limiting on form submissions
- ✅ **Config Protection** - Database credentials secured
- ✅ **HTTPS Ready** - SSL compatible

---

## 📱 Mobile Optimization

The website is fully responsive with:
- Touch-friendly buttons (minimum 44x44px)
- Simplified navigation on mobile
- Optimized images and assets
- Fast loading times
- Click-to-call functionality
- WhatsApp integration
- Gesture-friendly interactions

---

## 🧪 Testing

Before going live, complete the following tests:

### Functional Testing:
- [ ] Order form submission
- [ ] Booking form submission
- [ ] Email notifications
- [ ] Admin login
- [ ] Status updates
- [ ] Database operations

### Browser Testing:
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

### Device Testing:
- [ ] Desktop (1920x1080)
- [ ] Laptop (1366x768)
- [ ] Tablet (768x1024)
- [ ] Mobile (375x667)

See `TESTING_CHECKLIST.md` for complete guide.

---

## 📖 Documentation

- **DEPLOYMENT_GUIDE.md** - Complete hosting setup instructions
- **TESTING_CHECKLIST.md** - Comprehensive testing guide
- **database/schema.sql** - Database structure with comments
- **Code Comments** - Detailed inline documentation

---

## 🐛 Troubleshooting

### Common Issues:

**Database Connection Error:**
- Verify credentials in `config/db.php`
- Check database user privileges
- Ensure database exists

**Email Not Sending:**
- Verify SMTP settings in `mail/send_mail.php`
- Check spam folder
- Test with different SMTP port

**Forms Not Working:**
- Check JavaScript console for errors
- Verify PHP version (7.4+)
- Check file permissions

**Admin Login Failed:**
- Verify credentials in `admin/login.php`
- Clear browser cookies
- Check session settings

See `DEPLOYMENT_GUIDE.md` → Troubleshooting section for more solutions.

---

## 🔄 Maintenance

### Regular Tasks:

**Daily:**
- Check new orders and bookings
- Respond to customer requests
- Monitor email notifications

**Weekly:**
- Backup database
- Check error logs
- Update order/booking status

**Monthly:**
- Review and update menu
- Check website performance
- Update content as needed

---

## 🚀 Performance Optimization

Current optimizations:
- ✅ Minified CSS/JS (optional)
- ✅ Optimized images
- ✅ Database indexing
- ✅ Efficient queries
- ✅ Lazy loading (optional)
- ✅ Browser caching
- ✅ GZIP compression

---

## 📈 Future Enhancements

Potential additions:
- Payment gateway integration (Razorpay/PayU)
- Customer registration/login
- Order tracking system
- Loyalty points program
- Multi-language support
- Analytics dashboard
- SMS notifications
- Social media integration
- Online menu builder
- Inventory management

---

## 🌟 Business Information

**Restaurant:** Tea Spoon Restro and Cafe

**Location:** 
P3, 2, Opposite Gangasheel Hospital,
Deen Dayal Puram, Bareilly,
Uttar Pradesh 243122, India

**Phone:** +91 80066 77660

**Hours:** Daily 11:00 AM – 11:15 PM

**Cuisine:** North Indian, Mughlai, Fast Food, Sandwiches, Beverages

**Rating:** 4.6★ on Google

---

## 📄 License

This project is proprietary and confidential.
All rights reserved © Tea Spoon Restro and Cafe

---

## 👨‍💻 Development

**Built with:** Core PHP (No Framework)
**Design:** Custom Premium UI/UX
**Database:** MySQL with PDO
**Email:** PHPMailer with SMTP

**Development Time:** Production-ready codebase
**Code Quality:** Professional, well-commented, secure

---

## 📞 Support

For technical support or questions:
- Email: [your-email]
- Phone: +91 80066 77660
- Documentation: See DEPLOYMENT_GUIDE.md

---

## ✅ Deployment Checklist

Before going live:
- [ ] Update database credentials
- [ ] Configure email settings
- [ ] Change admin password
- [ ] Add restaurant images
- [ ] Test all forms
- [ ] Enable SSL certificate
- [ ] Set DEBUG_MODE to 0
- [ ] Backup database
- [ ] Test on mobile devices
- [ ] Verify email delivery

---

## 🎯 Key Features Summary

| Feature | Status | Description |
|---------|--------|-------------|
| Online Ordering | ✅ Complete | AJAX form with validation |
| Table Booking | ✅ Complete | Date/time selection system |
| Email Alerts | ✅ Complete | PHPMailer integration |
| Admin Panel | ✅ Complete | Full management system |
| Mobile Design | ✅ Complete | Fully responsive |
| Security | ✅ Complete | SQL injection & XSS protected |
| SEO Optimized | ✅ Complete | Meta tags & semantic HTML |
| Performance | ✅ Complete | Fast loading & optimized |

---

**Ready for Production Deployment!** 🚀

Follow the DEPLOYMENT_GUIDE.md for step-by-step hosting instructions.
