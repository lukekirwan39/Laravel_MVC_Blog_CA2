# Larablog

A simple blog application built with Laravel 8 for posting, managing, and reading articles.

---

## 👤 Test User Details

Use the following account to test the application:

- **Email:** larablogdev@gmail.com
- **Password:** 12345

---

## 📦 Features

- User authentication (login/register)
- SEO-friendly URLs and meta tags
- Image upload and preview
- Responsive design
- Forgot password functionality
- User profile updates
- Admin dashboard for managing posts
- Comments system

---

## 🛠️ Tech Stack

- Laravel 8
- Blade templating
- Tailwind CSS
- MySQL (MAMP)
- jQuery (image preview & UI helpers)

---

## ✅ Requirements

- PHP 7.3 or higher
- Composer
- Node.js 12.13.0 or higher
- MySQL (MAMP recommended)

---

## 🚀 Setup Instructions

### 1. Clone the repo

```bash
git clone [https://github.com/your-username/larablog.git](https://github.com/lukekirwan39/Laravel_MVC_Blog_CA2.git)
cd larablog

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>
```
git clone git@github.com:codewithdary/laravel-8-complete-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Create the environment file

```bash
cp .env.example .env
```

### 4. Configure .env

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=larablog_db
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"

EMAIL_HOST=
EMAIL_USERNAME=
EMAIL_PASSWORD=
EMAIL_PORT=
EMAIL_ENCRYPTION=
EMAIL_FROM_NAME=
EMAIL_FROM_ADDRESS=
```

### 5. Generate the application key

```bash
php artisan key:generate
```

### 6. Create the database

```bash
mysql
CREATE DATABASE larablog_db;
exit;
```

### 7. Run migrations

```bash
php artisan migrate
```

### 8. Link storage (REQUIRED for images)

```bash
php artisan storage:link
```

### 9. Clear caches (recommended)

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 10. Run the application

```bash
php artisan serve
```

#### Open the app at:
```
http://127.0.0.1:8000
```

## 🧪 Notes for Reviewers

- Images are stored in Laravel storage and linked using `php artisan storage:link`
- Example images are referenced from the database
- A test user account is provided above for easy access
- No additional setup is required beyond these steps

---

## 👨‍💻 Author

Luke Kirwan
