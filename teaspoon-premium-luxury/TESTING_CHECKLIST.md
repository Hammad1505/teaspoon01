# Tea Spoon Restro & Cafe - Testing Checklist

## 🧪 Complete Testing Guide

Use this checklist to ensure all features work correctly before going live.

---

## 1. FRONTEND TESTING

### Homepage / Hero Section
- [ ] Page loads without errors
- [ ] Restaurant name displays correctly
- [ ] Hero section background and overlay visible
- [ ] Rating badge (4.6★) displays
- [ ] All call-to-action buttons visible
- [ ] Scroll indicator animates properly
- [ ] Responsive on mobile devices
- [ ] Typography loads correctly (Google Fonts)

### Navigation Bar
- [ ] Logo displays correctly
- [ ] All menu items visible
- [ ] Navigation links work smoothly
- [ ] Sticky navbar works on scroll
- [ ] Background changes on scroll
- [ ] Mobile hamburger menu works
- [ ] Menu closes after link click (mobile)

### About Section
- [ ] Content displays correctly
- [ ] Feature boxes visible
- [ ] Icons load properly
- [ ] Hover effects work
- [ ] Responsive layout works

### Cuisine Banner
- [ ] All cuisine types display
- [ ] Icons show correctly
- [ ] Centered and aligned properly

### Menu Section
- [ ] All 6 menu cards display
- [ ] Images load (or placeholders show)
- [ ] Card hover effects work
- [ ] "Best Seller" badges visible
- [ ] Category tags display
- [ ] "View Full Menu" button works
- [ ] WhatsApp link opens correctly

### Reviews Section
- [ ] All 4 review cards visible
- [ ] Star ratings display
- [ ] Avatar circles show initials
- [ ] Responsive grid layout works

### Order & Booking Forms
- [ ] Both forms visible
- [ ] Form styling consistent
- [ ] Input fields work properly
- [ ] Required field validation works
- [ ] Placeholder text visible

### Contact Section
- [ ] Address displays correctly
- [ ] Phone number is clickable
- [ ] Business hours visible
- [ ] Google Maps embed loads
- [ ] "Get Directions" button works
- [ ] "WhatsApp" button works

### Footer
- [ ] Restaurant info displays
- [ ] Quick links work
- [ ] Contact info visible
- [ ] Social media icons show
- [ ] Copyright year is current
- [ ] Admin login link works

### Floating Action Buttons
- [ ] Call button visible
- [ ] WhatsApp button visible
- [ ] Pulse animation works
- [ ] Hover effects work
- [ ] Links open correctly
- [ ] Appear after scrolling 300px

---

## 2. FUNCTIONALITY TESTING

### Online Food Order Form

#### Valid Order Test:
1. [ ] Fill in valid name (e.g., "John Doe")
2. [ ] Enter 10-digit phone (e.g., "9876543210")
3. [ ] Select at least 1 menu item
4. [ ] Add special instructions (optional)
5. [ ] Click "Place Order"
6. [ ] Success message appears
7. [ ] Form resets after submission
8. [ ] Order saved in database
9. [ ] Email notification sent
10. [ ] WhatsApp redirect works (optional)

#### Invalid Order Tests:
- [ ] Empty name → Shows error
- [ ] Short name (1 char) → Shows error
- [ ] Empty phone → Shows error
- [ ] Invalid phone (less than 10 digits) → Shows error
- [ ] No items selected → Shows error
- [ ] Phone with letters → Auto-removed
- [ ] Phone over 10 digits → Truncated

### Table Booking Form

#### Valid Booking Test:
1. [ ] Fill in valid name
2. [ ] Enter 10-digit phone
3. [ ] Select future date
4. [ ] Select time slot
5. [ ] Choose number of guests
6. [ ] Add occasion (optional)
7. [ ] Click "Confirm Booking"
8. [ ] Success message appears
9. [ ] Booking details shown in message
10. [ ] Form resets
11. [ ] Booking saved in database
12. [ ] Email notification sent

#### Invalid Booking Tests:
- [ ] Empty name → Shows error
- [ ] Empty phone → Shows error
- [ ] Invalid phone → Shows error
- [ ] No date selected → Shows error
- [ ] Past date → Shows error
- [ ] No time selected → Shows error
- [ ] No guests selected → Shows error
- [ ] Duplicate booking (same phone/date/time) → Shows error

### Spam Protection
- [ ] Submit 3 orders quickly → Works
- [ ] 4th order within 1 hour → Blocked with message
- [ ] Same for bookings → Works correctly

---

## 3. ADMIN PANEL TESTING

### Login Page
- [ ] Page loads at `/admin/login.php`
- [ ] Form displays correctly
- [ ] Username field works
- [ ] Password field works (hidden)
- [ ] "Back to Website" link works

#### Valid Login:
- [ ] Username: `admin` (or your custom)
- [ ] Password: `teaspoon@2024` (or your custom)
- [ ] Click "Login"
- [ ] Redirects to dashboard
- [ ] Session created

#### Invalid Login:
- [ ] Wrong username → Error message
- [ ] Wrong password → Error message
- [ ] Empty fields → Browser validation

### Dashboard
- [ ] Statistics cards display
- [ ] Total orders count correct
- [ ] Total bookings count correct
- [ ] Pending orders count correct
- [ ] Pending bookings count correct
- [ ] Recent orders table shows (max 10)
- [ ] Recent bookings table shows (max 10)
- [ ] "View All" buttons work
- [ ] Logout button works

### View All Orders Page
- [ ] All orders display in table
- [ ] Order details visible
- [ ] Phone numbers are clickable
- [ ] Status badges show correctly
- [ ] Status dropdown works
- [ ] Changing status → Updates database
- [ ] Success message appears
- [ ] Empty state shows if no orders
- [ ] Back to dashboard works

### View All Bookings Page
- [ ] All bookings display
- [ ] Booking details visible
- [ ] Dates formatted correctly
- [ ] Times formatted correctly
- [ ] Phone numbers clickable
- [ ] Status dropdown works
- [ ] Changing status → Updates database
- [ ] Success message appears
- [ ] Empty state shows if no bookings
- [ ] Back to dashboard works

### Session & Security
- [ ] Accessing admin pages without login → Redirects to login
- [ ] Session persists across pages
- [ ] Logout clears session
- [ ] Can't access dashboard after logout

---

## 4. EMAIL NOTIFICATION TESTING

### Test Email Configuration
1. [ ] PHPMailer installed correctly
2. [ ] SMTP settings configured
3. [ ] Test email script works (optional)

### Order Email Test:
1. [ ] Place test order
2. [ ] Email received at owner email
3. [ ] Subject line correct
4. [ ] Order ID present
5. [ ] Customer name correct
6. [ ] Phone number correct
7. [ ] Items list correct
8. [ ] Special instructions shown (if provided)
9. [ ] Order timestamp correct
10. [ ] Email template styled correctly

### Booking Email Test:
1. [ ] Make test booking
2. [ ] Email received at owner email
3. [ ] Subject line correct
4. [ ] Booking ID present
5. [ ] Customer details correct
6. [ ] Date formatted correctly
7. [ ] Time formatted correctly
8. [ ] Number of guests correct
9. [ ] Occasion shown (if provided)
10. [ ] Email template styled correctly

### Email Deliverability:
- [ ] Not in spam folder
- [ ] Opens correctly in Gmail
- [ ] Opens correctly in Outlook
- [ ] Opens correctly on mobile
- [ ] Reply-to address works

---

## 5. DATABASE TESTING

### Connection Test:
- [ ] Database connects successfully
- [ ] No connection errors in logs

### Orders Table:
- [ ] New orders insert correctly
- [ ] All fields saved properly
- [ ] Status updates work
- [ ] Timestamps auto-populate
- [ ] Can query orders

### Seat Bookings Table:
- [ ] New bookings insert correctly
- [ ] All fields saved properly
- [ ] Unique constraint works (no duplicates)
- [ ] Status updates work
- [ ] Timestamps auto-populate
- [ ] Can query bookings

### Sample Data:
- [ ] Sample orders visible in admin
- [ ] Sample bookings visible in admin
- [ ] Can update sample data status

---

## 6. RESPONSIVE DESIGN TESTING

Test on the following devices/screen sizes:

### Desktop (1920x1080):
- [ ] Layout looks professional
- [ ] No horizontal scroll
- [ ] All sections aligned
- [ ] Images scale properly

### Laptop (1366x768):
- [ ] Layout adjusts correctly
- [ ] Readable font sizes
- [ ] Buttons accessible

### Tablet (768x1024):
- [ ] Navigation collapses to hamburger
- [ ] Forms stack vertically
- [ ] Cards responsive
- [ ] Touch targets adequate size

### Mobile (375x667 - iPhone):
- [ ] Single column layout
- [ ] Hamburger menu works
- [ ] Forms easy to fill
- [ ] Buttons large enough
- [ ] Text readable
- [ ] No content cut off
- [ ] Floating buttons positioned correctly

### Mobile (360x640 - Android):
- [ ] Layout works correctly
- [ ] All content visible
- [ ] Touch interactions work

---

## 7. BROWSER COMPATIBILITY

Test in these browsers:

### Chrome (Latest):
- [ ] All features work
- [ ] Forms submit correctly
- [ ] Animations smooth

### Firefox (Latest):
- [ ] All features work
- [ ] CSS renders correctly
- [ ] JavaScript functions

### Safari (Latest):
- [ ] All features work
- [ ] iOS compatibility
- [ ] Date/time pickers work

### Edge (Latest):
- [ ] All features work
- [ ] No compatibility issues

---

## 8. PERFORMANCE TESTING

### Page Load Speed:
- [ ] Homepage loads under 3 seconds
- [ ] Images optimized
- [ ] CSS/JS minified (optional)
- [ ] No console errors

### AJAX Performance:
- [ ] Order form submits quickly
- [ ] Booking form submits quickly
- [ ] Loading indicators show
- [ ] No timeout errors

### Database Performance:
- [ ] Queries execute quickly
- [ ] Admin panel loads fast
- [ ] No N+1 query issues

---

## 9. SEO & ACCESSIBILITY

### SEO Basics:
- [ ] Page title descriptive
- [ ] Meta description present
- [ ] Headings hierarchical (H1, H2, H3)
- [ ] Alt text on images
- [ ] Semantic HTML used

### Accessibility:
- [ ] Keyboard navigation works
- [ ] Form labels present
- [ ] Color contrast adequate
- [ ] Links descriptive
- [ ] ARIA labels where needed

---

## 10. SECURITY TESTING

### Form Security:
- [ ] SQL injection protected (prepared statements)
- [ ] XSS protection (htmlspecialchars)
- [ ] CSRF protection (session checks)
- [ ] Input sanitization works

### Admin Security:
- [ ] Login required for admin pages
- [ ] Password not visible in code
- [ ] Session timeout works
- [ ] Logout clears session

### File Security:
- [ ] Config files not publicly accessible
- [ ] Directory listing disabled
- [ ] .htaccess rules in place

### SSL/HTTPS:
- [ ] SSL certificate active
- [ ] HTTPS enforced
- [ ] No mixed content warnings

---

## 11. PRODUCTION CHECKLIST

Before going live:

- [ ] Change default admin password
- [ ] Set DEBUG_MODE to 0
- [ ] Update all SMTP credentials
- [ ] Add real restaurant images
- [ ] Update Google Maps coordinates
- [ ] Test email notifications
- [ ] Enable SSL certificate
- [ ] Set proper file permissions
- [ ] Backup database
- [ ] Test on real devices
- [ ] Clear browser cache and test
- [ ] Review all content for accuracy
- [ ] Test click-to-call phone numbers
- [ ] Test WhatsApp links
- [ ] Verify business hours accurate

---

## 12. ONGOING MONITORING

After launch:

- [ ] Check orders daily
- [ ] Check bookings daily
- [ ] Monitor email delivery
- [ ] Check error logs weekly
- [ ] Update menu as needed
- [ ] Backup database weekly
- [ ] Monitor site uptime
- [ ] Review analytics (if installed)

---

## ✅ FINAL SIGN-OFF

Date Tested: _______________

Tested By: _______________

All Critical Features Working: [ ] YES [ ] NO

Ready for Production: [ ] YES [ ] NO

Notes:
_________________________________
_________________________________
_________________________________

---

## 📞 Support Contacts

**Hosting Support:** Hostinger 24/7 Chat
**Developer:** [Your contact info]
**Emergency Phone:** +91 80066 77660

---

**Remember:** Test thoroughly in a staging environment before deploying to production!
