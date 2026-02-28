#!/bin/bash

# ========================================================
# Tea Spoon Restro & Cafe - Quick Setup Script
# For Linux/Unix servers (optional)
# ========================================================

echo "=================================================="
echo "Tea Spoon Restro & Cafe - Quick Setup"
echo "=================================================="
echo ""

# Check if running on correct directory
if [ ! -f "index.php" ]; then
    echo "❌ Error: Please run this script from the project root directory"
    exit 1
fi

echo "✅ Project files found"
echo ""

# Set correct permissions
echo "📁 Setting file permissions..."

# Folders: 755
find . -type d -exec chmod 755 {} \;

# Files: 644
find . -type f -exec chmod 644 {} \;

# Protect config files
chmod 600 config/db.php

echo "✅ Permissions set"
echo ""

# Check PHP version
echo "🔍 Checking PHP version..."
php_version=$(php -v | head -n 1 | cut -d " " -f 2 | cut -d "." -f 1,2)
echo "   PHP Version: $php_version"

if [ "$(echo "$php_version < 7.4" | bc)" -eq 1 ]; then
    echo "⚠️  Warning: PHP 7.4 or higher is recommended"
else
    echo "✅ PHP version is compatible"
fi
echo ""

# Check if MySQL is accessible
echo "🔍 Checking MySQL..."
if command -v mysql &> /dev/null; then
    echo "✅ MySQL is installed"
else
    echo "⚠️  MySQL not found in PATH (may still be available)"
fi
echo ""

# Create necessary directories
echo "📁 Creating directories..."

directories=(
    "assets/images"
    "assets/css"
    "assets/js"
)

for dir in "${directories[@]}"; do
    if [ ! -d "$dir" ]; then
        mkdir -p "$dir"
        echo "   Created: $dir"
    fi
done

echo "✅ Directories ready"
echo ""

# Check for Composer (for PHPMailer)
echo "🔍 Checking for Composer..."
if command -v composer &> /dev/null; then
    echo "✅ Composer is installed"
    echo ""
    read -p "Do you want to install PHPMailer now? (y/n) " -n 1 -r
    echo ""
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        echo "📦 Installing PHPMailer..."
        composer require phpmailer/phpmailer
        echo "✅ PHPMailer installed"
    fi
else
    echo "⚠️  Composer not found"
    echo "   Install PHPMailer manually from: https://github.com/PHPMailer/PHPMailer"
fi
echo ""

# Database setup reminder
echo "=================================================="
echo "📋 Next Steps:"
echo "=================================================="
echo ""
echo "1. Create MySQL database:"
echo "   - Database name: teaspoon_db"
echo "   - Import: database/schema.sql"
echo ""
echo "2. Configure database connection:"
echo "   - Edit: config/db.php"
echo "   - Update DB credentials"
echo ""
echo "3. Configure email settings:"
echo "   - Edit: mail/send_mail.php"
echo "   - Update SMTP credentials"
echo ""
echo "4. Change admin password:"
echo "   - Edit: admin/login.php"
echo "   - Update default credentials"
echo ""
echo "5. Add restaurant images:"
echo "   - Upload to: assets/images/"
echo "   - Required images listed in README.md"
echo ""
echo "6. Test the website:"
echo "   - Visit: http://localhost/index.php"
echo "   - Test all forms and features"
echo ""
echo "=================================================="
echo "✅ Setup script completed!"
echo "=================================================="
echo ""
echo "📖 For detailed instructions, see:"
echo "   - DEPLOYMENT_GUIDE.md"
echo "   - README.md"
echo "   - TESTING_CHECKLIST.md"
echo ""
