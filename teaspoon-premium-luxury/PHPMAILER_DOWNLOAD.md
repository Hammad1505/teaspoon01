# PHPMailer Installation Instructions

## 📧 Download PHPMailer

PHPMailer is required for email notifications in the Tea Spoon restaurant website.

---

## Option 1: Manual Download (Recommended)

### Step 1: Download PHPMailer
Visit: https://github.com/PHPMailer/PHPMailer/releases

Download the latest release (ZIP file)

### Step 2: Extract Files
From the downloaded ZIP, you need only these 3 files:
- `PHPMailer.php`
- `SMTP.php`
- `Exception.php`

These files are located in the `src/` folder of the extracted ZIP.

### Step 3: Upload to Your Server
Upload the 3 files to: `/public_html/mail/` directory

Your final structure should be:
```
/public_html/mail/
├── PHPMailer.php
├── SMTP.php
├── Exception.php
└── send_mail.php (already included in project)
```

---

## Option 2: Using Composer (For Developers)

If you have Composer installed on your server:

```bash
cd /public_html
composer require phpmailer/phpmailer
```

Then update the include paths in `mail/send_mail.php`:

Change from:
```php
require_once __DIR__ . '/PHPMailer.php';
require_once __DIR__ . '/SMTP.php';
require_once __DIR__ . '/Exception.php';
```

To:
```php
require 'vendor/autoload.php';
```

---

## Quick Links

**PHPMailer GitHub:** https://github.com/PHPMailer/PHPMailer
**Latest Release:** https://github.com/PHPMailer/PHPMailer/releases/latest
**Documentation:** https://github.com/PHPMailer/PHPMailer/wiki

---

## Verification

After uploading PHPMailer files, verify the installation:

1. Create a test file `test_phpmailer.php` in your root directory:

```php
<?php
if (file_exists('mail/PHPMailer.php') && 
    file_exists('mail/SMTP.php') && 
    file_exists('mail/Exception.php')) {
    echo "✅ PHPMailer files found!";
} else {
    echo "❌ PHPMailer files missing!";
}
?>
```

2. Visit: https://yourdomain.com/test_phpmailer.php
3. Delete the test file after verification

---

## Alternative: Pre-configured PHPMailer

If you prefer, download the three required files directly:

**PHPMailer.php:**
https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/PHPMailer.php

**SMTP.php:**
https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/SMTP.php

**Exception.php:**
https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/Exception.php

Right-click each link, "Save As", and upload to `/mail/` directory.

---

## Troubleshooting

### Issue: Files not found
- Verify files are in `/public_html/mail/` directory
- Check file names are exactly: PHPMailer.php, SMTP.php, Exception.php
- Ensure file permissions are 644

### Issue: Email sending fails
- Verify SMTP credentials in `mail/send_mail.php`
- Check if port 587 is open on your server
- Review error logs for specific error messages

---

## File Sizes (Approximate)

- PHPMailer.php: ~150 KB
- SMTP.php: ~50 KB
- Exception.php: ~1 KB
- **Total:** ~200 KB

---

## License

PHPMailer is released under the LGPL-2.1 license.
Free to use in both personal and commercial projects.

---

**Need Help?**

Check the complete deployment guide: `DEPLOYMENT_GUIDE.md`
Or contact your hosting provider's support team.
