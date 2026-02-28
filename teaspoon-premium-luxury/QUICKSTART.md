# 🚀 Quick Start Guide - Tea Spoon Restaurant Website

Get your restaurant website online in 30 minutes!

---

## ⚡ 5-Minute Setup Checklist

### ✅ STEP 1: Database (5 minutes)
1. Login to Hostinger control panel
2. Go to Databases → Create MySQL Database
3. Note down: username, password, database name
4. Open phpMyAdmin → Import `database_schema.sql`

### ✅ STEP 2: Upload Files (5 minutes)
1. Open File Manager in Hostinger
2. Navigate to `public_html`
3. Upload ALL project files
4. Verify folder structure matches documentation

### ✅ STEP 3: Configure Database (2 minutes)
1. Edit `config/db.php`
2. Update 4 values:
   - DB_HOST (usually 'localhost')
   - DB_USER (your database username)
   - DB_PASS (your database password)
   - DB_NAME (your database name)
3. Save file

### ✅ STEP 4: PHPMailer (5 minutes)
1. Download PHPMailer from GitHub
2. Extract 3 files: PHPMailer.php, SMTP.php, Exception.php
3. Upload to `/mail/` directory
4. See `PHPMAILER_DOWNLOAD.md` for details

### ✅ STEP 5: Email Setup (5 minutes)
1. Create email: orders@yourdomain.com in Hostinger
2. Edit `mail/send_mail.php`
3. Update SMTP settings (see file for details)
4. Save file

### ✅ STEP 6: Images (5 minutes)
1. Prepare 9 restaurant images
2. Upload to `assets/images/`
3. See `IMAGE_REQUIREMENTS.md` for list
4. Or use temporary placeholders

### ✅ STEP 7: SSL & Test (3 minutes)
1. Install SSL certificate in Hostinger
2. Visit https://yourdomain.com
3. Test order form
4. Test booking form
5. Check admin panel

### ✅ STEP 8: Security (2 minutes)
1. Login to admin panel
2. Change default password
3. Test logout and re-login
4. You're live! 🎉

---

## 📁 What You Got

### Main Files:
- `index.php` - Main website
- `database_schema.sql` - Database structure
- `.htaccess` - Security & performance

### Directories:
- `assets/` - CSS, JS, Images
- `config/` - Database configuration
- `order/` - Order processing
- `booking/` - Booking processing
- `admin/` - Admin panel (3 pages)
- `mail/` - Email configuration

### Documentation:
- `README.md` - Complete documentation
- `DEPLOYMENT_GUIDE.md` - Step-by-step deployment
- `TESTING_CHECKLIST.md` - Full testing guide
- `IMAGE_REQUIREMENTS.md` - Image specifications
- `PHPMAILER_DOWNLOAD.md` - PHPMailer setup
- `QUICKSTART.md` - This file

---

## 🔑 Important Credentials

### Admin Panel:
```
URL: https://yourdomain.com/admin/login.php
Username: admin
Password: teaspoon@2024
```

⚠️ **CHANGE PASSWORD IMMEDIATELY AFTER FIRST LOGIN!**

### Database:
```
Host: localhost
User: [from Hostinger]
Password: [from Hostinger]
Database: [from Hostinger]
```

### Email:
```
SMTP Host: smtp.hostinger.com
Port: 587
Encryption: TLS
```

---

## 🎯 What Works Out of the Box

### Customer Features:
✅ Beautiful one-page website
✅ Responsive design (mobile, tablet, desktop)
✅ Online food ordering
✅ Table booking system
✅ Click-to-call buttons
✅ WhatsApp integration
✅ Google Maps integration
✅ Customer reviews display
✅ Menu highlights showcase

### Admin Features:
✅ Secure login system
✅ Dashboard with statistics
✅ View all orders
✅ View all bookings
✅ Update order/booking status
✅ Click-to-call customers
✅ Email notifications

### Technical Features:
✅ MySQL database
✅ AJAX form submissions
✅ Email notifications (PHPMailer)
✅ Input sanitization
✅ SQL injection protection
✅ Rate limiting (spam prevention)
✅ Session security
✅ Error logging

---

## 🔧 Common First-Time Issues

### Issue: White Screen
**Solution:** Check `config/db.php` credentials

### Issue: Forms Not Working
**Solution:** Verify database connection

### Issue: Emails Not Sending
**Solution:** Check SMTP settings in `mail/send_mail.php`

### Issue: Images Not Showing
**Solution:** Upload images to `assets/images/`

### Issue: Admin Login Failed
**Solution:** Use default credentials: admin / teaspoon@2024

---

## 📞 Restaurant Contact Info

Update these in `index.php` if needed:
- Phone: +91 80066 77660
- Address: P3, 2, Opposite Gangasheel Hospital, Deen Dayal Puram, Bareilly, UP 243122
- Business Hours: 11:00 AM – 11:15 PM Daily

---

## 🎨 Customization Tips

### Change Colors:
Edit `assets/css/style.css` - Update CSS variables at top:
```css
:root {
    --primary-color: #D4691E;  /* Orange */
    --secondary-color: #2C3E50; /* Dark blue */
    --accent-gold: #E8B75D;    /* Gold */
}
```

### Change Restaurant Info:
Edit `index.php` - Update text content directly

### Add More Menu Items:
Duplicate menu card HTML in `index.php`

### Change Admin Password:
See `admin/login.php` - Follow instructions in comments

---

## 📱 Mobile Testing

Test on these devices:
- ✅ iPhone (Safari)
- ✅ Android (Chrome)
- ✅ iPad (Safari)
- ✅ Tablet (Chrome)

---

## 🔐 Security Checklist

Before going live:
- [ ] Change admin password
- [ ] Install SSL certificate
- [ ] Test all forms
- [ ] Verify email notifications
- [ ] Check database connection
- [ ] Review error logs
- [ ] Test on mobile devices

---

## 📊 Performance Tips

### After Launch:
1. Enable GZIP compression (already in .htaccess)
2. Install SSL for HTTPS
3. Optimize images before upload
4. Enable browser caching
5. Monitor server resources

---

## 🎉 Launch Checklist

Ready to go live? Check all:
- [ ] Database created and schema imported
- [ ] All files uploaded correctly
- [ ] Database credentials configured
- [ ] PHPMailer installed
- [ ] Email settings configured
- [ ] Images uploaded (or placeholders)
- [ ] SSL certificate installed
- [ ] Website accessible via HTTPS
- [ ] Forms tested and working
- [ ] Admin panel accessible
- [ ] Admin password changed
- [ ] Contact info verified
- [ ] Mobile responsive tested

---

## 🆘 Need Help?

### Check These First:
1. `README.md` - Complete documentation
2. `DEPLOYMENT_GUIDE.md` - Detailed deployment steps
3. `TESTING_CHECKLIST.md` - Comprehensive testing
4. Hostinger support - 24/7 live chat

### Hosting Support:
- **Hostinger Live Chat:** Available in control panel
- **Email:** support@hostinger.com
- **Knowledge Base:** support.hostinger.com

### Check Error Logs:
- Hostinger Panel → Websites → Manage → Error Log
- Or: `/logs/php_errors.log` (if enabled)

---

## 🌟 Tips for Success

### Day 1:
- Test all features thoroughly
- Share website with friends for feedback
- Monitor orders and bookings

### Week 1:
- Add to Google My Business
- Share on social media
- Promote to existing customers

### Month 1:
- Gather customer feedback
- Monitor admin panel regularly
- Backup database weekly

---

## 🎊 Congratulations!

You now have a fully functional, professional restaurant website!

**Next Steps:**
1. Share your website link with customers
2. Add link to your social media profiles
3. Print QR code for in-restaurant ordering
4. Update Google My Business with website link
5. Start receiving online orders! 🍴

---

## 📈 Growing Your Business

### Marketing Ideas:
- Google My Business listing
- Social media promotion
- Email marketing
- Loyalty programs
- Online reviews
- Food delivery apps integration

### Website Enhancements:
- Add photo gallery
- Customer testimonials page
- Blog/news section
- Online payment integration
- Loyalty points system
- Mobile app

---

## 📧 Stay Connected

For updates, improvements, or support:
- Save this documentation
- Backup your database regularly
- Keep PHP and MySQL updated
- Monitor website performance

---

**Built with ❤️ for Tea Spoon Restro and Cafe**

**Version:** 1.0  
**Release Date:** February 2026  
**Framework:** Pure PHP + MySQL + Bootstrap 5

---

## ✅ Post-Launch Tasks

### Immediately After Launch:
- [ ] Test order form with real order
- [ ] Test booking form with real reservation
- [ ] Verify email notifications arrive
- [ ] Check admin panel shows data
- [ ] Test on multiple devices
- [ ] Share with team/staff

### Within 24 Hours:
- [ ] Add website to business cards
- [ ] Update social media bios
- [ ] Inform existing customers
- [ ] Create backup

### Within 1 Week:
- [ ] Monitor first orders/bookings
- [ ] Respond to customer inquiries
- [ ] Gather initial feedback
- [ ] Make minor adjustments

---

**🚀 Ready? Let's Launch!**

Start with STEP 1 above and work your way through.
You'll be live in 30 minutes!

**Good luck! 🎉**
