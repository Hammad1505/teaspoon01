# Tea Spoon Restro & Cafe - Quick Reference Guide

## 🚀 One-Page Quick Start

### 1. Upload Files
```
Upload all files to: /public_html/
```

### 2. Database Setup
```sql
CREATE DATABASE teaspoon_db;
-- Import database/schema.sql via phpMyAdmin
```

### 3. Configure (3 Files to Edit)

**File 1: config/db.php**
```php
define('DB_NAME', 'your_db_name');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_password');
define('DEBUG_MODE', 0); // Production
```

**File 2: mail/send_mail.php**
```php
define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_USERNAME', 'orders@yourdomain.com');
define('SMTP_PASSWORD', 'your_email_password');
define('MAIL_TO_EMAIL', 'owner@yourdomain.com');
```

**File 3: admin/login.php**
```php
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'your_secure_password'); // CHANGE THIS!
```

### 4. Install PHPMailer
```bash
composer require phpmailer/phpmailer
```
Or download from: https://github.com/PHPMailer/PHPMailer

### 5. Add Images
Upload to `assets/images/`:
- paneer-butter-masala.jpg
- kadai-paneer.jpg
- parathas.jpg
- veg-platter.jpg
- wraps-rolls.jpg
- beverages.jpg
- restaurant-interior.jpg

### 6. Enable SSL
- cPanel → SSL/TLS Status
- Install Free SSL Certificate

### 7. Test
- Visit: https://yourdomain.com
- Test order form
- Test booking form
- Login admin: yourdomain.com/admin/login.php

---

## 📞 Important Links

### Frontend
- **Website:** yourdomain.com
- **Menu:** yourdomain.com#menu
- **Contact:** yourdomain.com#contact

### Admin Panel
- **Login:** yourdomain.com/admin/login.php
- **Dashboard:** yourdomain.com/admin/dashboard.php
- **Orders:** yourdomain.com/admin/view_orders.php
- **Bookings:** yourdomain.com/admin/view_bookings.php

### Business Info
- **Phone:** +91 80066 77660
- **WhatsApp:** wa.me/918006677660
- **Location:** Deen Dayal Puram, Bareilly, UP

---

## 🔑 Default Credentials

### Admin Panel
```
Username: admin
Password: teaspoon@2024
```
**⚠️ CHANGE IMMEDIATELY!**

### Database (Example)
```
Host: localhost
Database: teaspoon_db
User: teaspoon_user
Password: (create your own)
```

---

## 📋 Essential URLs

### Customer Actions
- Order Food: `/#order`
- Book Table: `/#order`
- Call Now: `tel:+918006677660`
- WhatsApp: `https://wa.me/918006677660`
- Directions: Google Maps link

### Admin Actions
- View Orders: `/admin/view_orders.php`
- View Bookings: `/admin/view_bookings.php`
- Update Status: Use dropdown in tables
- Logout: `/admin/logout.php`

---

## 🛠️ Common Tasks

### Update Order Status
1. Login to admin panel
2. Go to "View All Orders"
3. Select status from dropdown
4. Auto-saves on change

### Update Booking Status
1. Login to admin panel
2. Go to "View All Bookings"
3. Select status from dropdown
4. Auto-saves on change

### Backup Database
```bash
# Via SSH/Terminal
mysqldump -u username -p database_name > backup.sql

# Or use phpMyAdmin → Export
```

### Check Error Logs
- cPanel → Error Logs
- Or check: `/home/username/error_log`

---

## 🔧 Troubleshooting Quick Fixes

### Forms Not Working
```php
// In config/db.php, temporarily enable:
define('DEBUG_MODE', 1);
// Check for errors, then set back to 0
```

### Email Not Sending
1. Check spam folder
2. Verify SMTP credentials
3. Try port 465 instead of 587
4. Contact hosting support

### Database Connection Error
1. Verify credentials in config/db.php
2. Check database exists in phpMyAdmin
3. Ensure user has all privileges

### Admin Can't Login
1. Verify credentials in admin/login.php
2. Clear browser cookies
3. Try different browser

### 500 Internal Server Error
1. Check file permissions (755/644)
2. Check .htaccess file
3. Enable error reporting
4. Check PHP error logs

---

## 📊 File Permissions

```
Folders: 755
Files: 644
config/: 600 (sensitive)
.htaccess: 644
```

Set via cPanel File Manager:
Right-click → Permissions

---

## 📧 Email Templates

### Test Email
```php
// In mail/send_mail.php
sendTestEmail(); // Uncomment and visit page
```

### Email Goes To
- **Owner Email:** Defined in `MAIL_TO_EMAIL`
- **From Email:** Defined in `MAIL_FROM_EMAIL`

---

## 🎨 Customization Points

### Change Colors
Edit `assets/css/style.css`:
```css
:root {
    --primary-color: #C17817; /* Change this */
    --primary-dark: #8B5A10;  /* And this */
}
```

### Update Business Info
Edit `index.php`:
- Restaurant name
- Address
- Phone number
- Business hours
- Menu items

### Update About Text
Edit `index.php` → About Section

### Change Hero Image
Edit `assets/css/style.css` → `.hero-section`

---

## 🔒 Security Checklist

Before going live:
- [ ] Change admin password
- [ ] Set DEBUG_MODE to 0
- [ ] Enable SSL (HTTPS)
- [ ] Secure config files
- [ ] Test all forms
- [ ] Verify email delivery
- [ ] Check file permissions
- [ ] Review .htaccess rules

---

## 📈 Performance Tips

1. **Enable GZIP** (in .htaccess)
2. **Optimize Images** (compress before upload)
3. **Enable Caching** (browser cache in .htaccess)
4. **Use CDN** (for Bootstrap/Font Awesome)
5. **Minify CSS/JS** (optional, for production)

---

## 🌟 Feature Status

| Feature | Status |
|---------|--------|
| Online Ordering | ✅ Ready |
| Table Booking | ✅ Ready |
| Email Notifications | ✅ Ready |
| Admin Panel | ✅ Ready |
| Mobile Responsive | ✅ Ready |
| SSL Compatible | ✅ Ready |
| SEO Optimized | ✅ Ready |
| Production Ready | ✅ Yes |

---

## 📞 Support Contacts

### Hosting Issues
- Hostinger: 24/7 Live Chat in cPanel

### Email Issues
- Check SMTP documentation for your provider

### Website Issues
- Check DEPLOYMENT_GUIDE.md
- Check TESTING_CHECKLIST.md
- Review code comments

---

## 🎯 Success Metrics

After launch, monitor:
- Daily orders received
- Daily bookings made
- Email delivery rate
- Website uptime
- Page load speed
- Mobile usage stats

---

## 📅 Maintenance Schedule

### Daily
- Check orders
- Check bookings
- Respond to customers

### Weekly
- Backup database
- Check error logs
- Update order statuses

### Monthly
- Update menu
- Review analytics
- Update content
- Security audit

---

## 🚀 Go Live Checklist

Final checks before launch:
1. [ ] Database configured
2. [ ] Email tested and working
3. [ ] Admin credentials changed
4. [ ] All images uploaded
5. [ ] SSL certificate active
6. [ ] Mobile tested
7. [ ] All forms tested
8. [ ] Debug mode disabled
9. [ ] Backup created
10. [ ] Documentation reviewed

---

**You're ready to launch!** 🎉

For detailed information, see:
- **DEPLOYMENT_GUIDE.md** - Complete setup
- **README.md** - Project overview
- **TESTING_CHECKLIST.md** - Testing guide
