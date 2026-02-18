# Sklep-PHP

A simple e-commerce web application built with PHP and MySQL.

## Features

- User registration and login
- Product browsing by categories
- Shopping cart
- Checkout and order management
- Shipping address management
- User account settings
- Admin panel for product management

## Requirements

- PHP 5.6+
- MySQL 5.6+
- A web server (e.g. Apache with mod_php)
- phpMyAdmin (optional, for database management)

## Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/Krzykoz/Sklep-PHP.git
   ```

2. Import the database schema:
   - Create a MySQL database named `mydb`.
   - Import `mydb.sql` using phpMyAdmin or the MySQL CLI:
     ```bash
     mysql -u root mydb < mydb.sql
     ```

3. Configure the database connection in `website/conn.php` if your credentials differ from the defaults (`root` with no password on `localhost`).

4. Point your web server's document root to the `website/` directory (or access it via your existing server setup).

5. Open the application in your browser.

## Project Structure

```
├── mydb.sql            # Database schema and seed data
└── website/
    ├── index.php       # Main entry point
    ├── conn.php        # Database connection
    ├── register.php    # User registration
    ├── login.php       # User login
    ├── cart.php        # Shopping cart
    ├── checkout.php    # Checkout page
    ├── orders.php      # Order history
    ├── account.php     # User account
    ├── main.css        # Stylesheet
    ├── images/         # Product and site images
    └── admin/          # Admin panel
```

## License

This project does not currently specify a license.
