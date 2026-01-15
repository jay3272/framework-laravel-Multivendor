# Bagisto Multi-vendor Installation Guide

This guide provides detailed instructions for installing and setting up the Bagisto Multi-vendor e-commerce framework.

## Prerequisites

Before you begin, ensure you have the following installed on your system:

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 18.x
- **NPM** or **Yarn**
- **MySQL** >= 5.7 or **MariaDB** >= 10.3 (or **SQLite** for development)
- **Git**

### PHP Extensions Required

Make sure the following PHP extensions are enabled:

- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- Ctype
- JSON
- BCMath
- Fileinfo
- GD or Imagick

## Step-by-Step Installation

### 1. Clone the Repository

```bash
git clone https://github.com/jay3272/framework-laravel-Multivendor.git
cd framework-laravel-Multivendor
```

### 2. Install PHP Dependencies

```bash
composer install
```

If you encounter any issues, try:

```bash
composer install --ignore-platform-reqs
```

### 3. Install JavaScript Dependencies

```bash
npm install
```

or if you prefer Yarn:

```bash
yarn install
```

### 4. Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

Edit the `.env` file and configure your settings:

#### Database Configuration

For **MySQL/MariaDB**:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bagisto_multivendor
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

For **SQLite** (development only):

```env
DB_CONNECTION=sqlite
# DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD are not needed for SQLite
```

#### Application Configuration

```env
APP_NAME="Bagisto Multi-vendor"
APP_ENV=local
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost:8000
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Create Database

Create a new database for your application:

**For MySQL/MariaDB:**

```bash
mysql -u your_username -p
```

```sql
CREATE DATABASE bagisto_multivendor CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

**For SQLite:**

```bash
touch database/database.sqlite
```

### 7. Run Database Migrations

```bash
php artisan migrate
```

### 8. Seed the Database (Optional)

This will create default admin, vendor, and customer users:

```bash
php artisan db:seed
```

**Default User Credentials:**

| Role     | Email                  | Password    |
|----------|------------------------|-------------|
| Admin    | admin@example.com      | admin123    |
| Vendor   | vendor@example.com     | vendor123   |
| Customer | customer@example.com   | customer123 |

**⚠️ Important:** Change these passwords immediately in production!

### 9. Create Storage Link

```bash
php artisan storage:link
```

### 10. Build Frontend Assets

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

### 11. Set Directory Permissions

Ensure the following directories are writable:

```bash
chmod -R 775 storage bootstrap/cache
```

On Linux/Mac:

```bash
sudo chown -R www-data:www-data storage bootstrap/cache
```

### 12. Start Development Server

```bash
php artisan serve
```

The application will be available at: **http://localhost:8000**

## Post-Installation Steps

### 1. Access the Application

- **Storefront:** http://localhost:8000
- **Admin Panel:** http://localhost:8000/admin
- **Vendor Dashboard:** http://localhost:8000/vendor

### 2. Configure Email (Optional)

Update your `.env` file with email settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 3. Configure Queue (Optional)

For better performance, configure a queue driver:

```env
QUEUE_CONNECTION=database
```

Run the queue worker:

```bash
php artisan queue:work
```

### 4. Configure Cache (Optional)

For production, use Redis or Memcached:

```env
CACHE_STORE=redis
SESSION_DRIVER=redis
```

## Production Deployment

### Additional Steps for Production

1. **Set Environment to Production:**

```env
APP_ENV=production
APP_DEBUG=false
```

2. **Optimize Application:**

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

3. **Set Up Queue Worker:**

Use Supervisor or systemd to keep the queue worker running.

4. **Configure Web Server:**

Set up Nginx or Apache to serve your application. Example Nginx configuration:

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/framework-laravel-Multivendor/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

5. **Set Up SSL Certificate:**

Use Let's Encrypt for free SSL certificates:

```bash
sudo certbot --nginx -d your-domain.com
```

## Troubleshooting

### Common Issues

**Issue:** Composer install fails

**Solution:** Try running with `--ignore-platform-reqs` flag or update your PHP version.

---

**Issue:** Permission denied errors

**Solution:** Ensure storage and bootstrap/cache directories have proper permissions (775).

---

**Issue:** Database connection errors

**Solution:** Verify your database credentials in `.env` and ensure the database server is running.

---

**Issue:** npm install fails

**Solution:** Clear npm cache: `npm cache clean --force` and try again.

---

**Issue:** Migration errors

**Solution:** Ensure database exists and credentials are correct. Drop all tables and run migrations again if needed.

## Next Steps

- Customize the application theme
- Configure payment gateways
- Set up shipping methods
- Add product categories
- Configure tax rules
- Set up email templates

## Support

For issues and questions:
- GitHub Issues: https://github.com/jay3272/framework-laravel-Multivendor/issues
- Documentation: Check README.md

## Security

If you discover a security vulnerability, please email security@example.com.
