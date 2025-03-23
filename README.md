# Larablog

A simple blog application built with Laravel 8 for posting, managing, and reading articles.

## Password for all Users
Password: 12345

## 📦 Features

- User authentication (login/register)
- SEO-friendly URLs and meta tags
- Image upload and preview
- Responsive design with Tailwind CSS
- Forgot password
- Profile changes

## 🛠️ Tech Stack

- Laravel 8
- Blade templating
- Tailwind CSS
- MySQL/MAMP
- jQuery (for image preview)

## 🚀 Setup Instructions

### 1. Clone the repo

```bash
git clone [https://github.com/your-username/larablog.git](https://github.com/lukekirwan39/Laravel_MVC_Blog_CA2.git)
cd larablog

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Author
Luke Kirwan

## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone git@github.com:codewithdary/laravel-8-complete-blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting <br>
Create a database <br>
```
mysql
create database laravelblog;
exit;
```

Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelblog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables
```
php artisan migrate
```

## Contributing
Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.
