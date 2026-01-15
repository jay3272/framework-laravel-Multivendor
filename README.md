# Bagisto Multi-vendor E-commerce Framework

A Laravel-based multi-vendor e-commerce marketplace framework built on top of Bagisto.

## About

This is a multi-vendor e-commerce platform that allows multiple sellers to sell their products through a single storefront. Built with Laravel framework and Bagisto packages, it provides a complete solution for creating an online marketplace.

## Features

- **Multi-vendor Support**: Allow multiple vendors to register and sell products
- **Vendor Dashboard**: Separate dashboard for vendors to manage their products, orders, and sales
- **Admin Panel**: Comprehensive admin panel to manage vendors, products, orders, and customers
- **Product Management**: Full-featured product catalog management
- **Order Management**: Complete order processing and tracking system
- **Payment Integration**: Support for multiple payment gateways
- **Responsive Design**: Mobile-friendly interface for customers and vendors
- **Multi-language & Multi-currency**: Support for international markets

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB or SQLite
- Web Server (Apache/Nginx)

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/jay3272/framework-laravel-Multivendor.git
cd framework-laravel-Multivendor
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Configuration

```bash
cp .env.example .env
```

Edit the `.env` file and configure your database and other settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bagisto_multivendor
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Seed Database (Optional)

```bash
php artisan db:seed
```

### 7. Build Assets

```bash
npm run build
```

### 8. Start Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Default Admin Credentials

After installation and seeding, you can access the admin panel with:

- URL: `http://localhost:8000/admin`
- Email: `admin@example.com`
- Password: `admin123`

**Note**: Change these credentials immediately after first login.

## Usage

### For Vendors

1. Register as a vendor from the storefront
2. Wait for admin approval
3. Access your vendor dashboard
4. Add products and manage orders

### For Administrators

1. Login to admin panel
2. Manage vendors, products, and orders
3. Configure system settings
4. Monitor marketplace activity

## Development

### Running Tests

```bash
php artisan test
```

### Code Style

```bash
./vendor/bin/pint
```

### Running in Development Mode

```bash
npm run dev
```

## Technology Stack

- **Framework**: Laravel 12.x
- **E-commerce**: Bagisto Packages
- **Frontend**: Blade Templates, Vue.js
- **Database**: MySQL/MariaDB/SQLite
- **Cache**: Redis (optional)
- **Queue**: Database/Redis

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For issues and questions, please use the GitHub issues page.

## Credits

- Built on [Laravel](https://laravel.com)
- E-commerce functionality powered by [Bagisto](https://bagisto.com)

---

**Note**: This is a framework setup for building a multi-vendor e-commerce platform. Additional configuration and customization will be needed based on your specific requirements.
