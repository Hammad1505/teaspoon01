# Admin Panel Access Guide

## 🔐 Separate Admin Panel

The admin panel is **completely separate** from the main restaurant website for better security and organization.

---

## 📍 Admin Panel URLs

### Main Website (Public)
```
https://yourdomain.com/
```
This is the customer-facing restaurant website.

### Admin Panel (Restricted)
```
https://yourdomain.com/admin/
```
This is the secure admin area - accessible only to restaurant owners/managers.

---

## 🚀 How to Access Admin Panel

### Option 1: Direct URL
Simply visit: `https://yourdomain.com/admin/`

### Option 2: Bookmark It
Add this URL to your browser bookmarks for quick access:
- **URL:** `https://yourdomain.com/admin/`
- **Name:** "Restaurant Admin Panel"

### Option 3: Type in Browser
In your browser address bar, type:
```
yourdomain.com/admin
```

---

## 🔑 Default Login Credentials

**⚠️ IMPORTANT: Change these immediately after first login!**

**Username:** `admin`  
**Password:** `teaspoon@2024`

### How to Change Password:
1. Edit file: `admin/login.php`
2. Find these lines:
```php
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'teaspoon@2024');
```
3. Change to your secure credentials:
```php
define('ADMIN_USERNAME', 'your_username');
define('ADMIN_PASSWORD', 'your_secure_password');
```
4. Save and upload

---

## 📱 Admin Panel Features

Once logged in, you can:

✅ **View Dashboard**
- Total orders count
- Total bookings count
- Pending orders
- Pending bookings
- Quick overview of recent activity

✅ **Manage Orders**
- View all food orders
- See customer details
- Update order status (pending → confirmed → completed)
- Contact customers directly

✅ **Manage Bookings**
- View all table reservations
- See booking details (date, time, guests)
- Update booking status
- Contact customers

✅ **Secure Logout**
- Always logout when done

---

## 🛡️ Security Features

1. **Separate Access:** Admin panel is not linked from main website
2. **Password Protected:** Requires login to access
3. **Session Management:** Automatic logout on inactivity
4. **Direct Access Only:** Not indexed by search engines

---

## 📋 Admin Panel Structure

```
/admin/
├── index.php           # Admin landing page (you are here)
├── login.php           # Login form
├── dashboard.php       # Main dashboard
├── view_orders.php     # All orders list
├── view_bookings.php   # All bookings list
└── logout.php          # Secure logout
```

---

## 💡 Pro Tips

1. **Bookmark the Admin URL** for quick access
2. **Don't share admin credentials** with unauthorized users
3. **Check admin panel daily** for new orders and bookings
4. **Logout after use** especially on shared computers
5. **Use strong passwords** for security

---

## 🔄 Daily Workflow

### Morning Routine:
1. Visit: `yourdomain.com/admin`
2. Login with credentials
3. Check dashboard for new orders/bookings
4. Process pending orders
5. Confirm table bookings
6. Logout

### Throughout the Day:
- Check for new orders
- Update order status as you prepare food
- Confirm or modify bookings

### End of Day:
- Mark completed orders
- Review tomorrow's bookings
- Logout

---

## 🆘 Troubleshooting

### Can't Access Admin Panel?
**Problem:** Page not found  
**Solution:** Make sure you're using the correct URL: `yourdomain.com/admin/`

**Problem:** Login not working  
**Solution:** 
1. Check username and password in `admin/login.php`
2. Clear browser cookies
3. Try different browser

**Problem:** Forgot password  
**Solution:** 
1. Access your hosting via FTP or cPanel File Manager
2. Edit `admin/login.php`
3. Set new password
4. Save and upload

---

## 📞 Need Help?

- **Website Issues:** Check DEPLOYMENT_GUIDE.md
- **Hosting Issues:** Contact Hostinger support (24/7)
- **Email Issues:** Check mail/send_mail.php configuration

---

## ⚡ Quick Access Checklist

- [ ] Admin URL bookmarked
- [ ] Default password changed
- [ ] Admin panel tested
- [ ] Email notifications working
- [ ] Can view orders
- [ ] Can view bookings
- [ ] Logout works properly

---

**Remember:** The admin panel is your control center for managing the restaurant's online orders and bookings. Keep the URL and credentials secure!

---

## 🎯 Admin Panel URL (Write it down!)

```
https://_____________.com/admin/
```

**Save this information in a secure place!**
