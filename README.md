 LES   Grocery Store E commerce Platform

 Overview
LES is a modern grocery store e commerce web application built with Laravel 12 and PHP 8.2, designed for online grocery shopping with a focus on user experience and performance.

 Features
  Shopping Cart: Session based cart management with AJAX updates
  Product Catalog: Browse products by categories with search functionality
  Hot Offers: Special deals and discounted products section
  Multi language Support: Internationalization support with language switcher
  Responsive Design: Mobile friendly interface with modal cart
  Modern UI: Clean design with Font Awesome icons and Open Sans font

 Tech Stack
  Backend: Laravel 12, PHP 8.2
  Database: MySQL 8.0
  Frontend: Plain CSS, JavaScript (no runtime CSS frameworks)
  Build Tool: Vite
  Containerization: Docker & Docker Compose

 Architecture
  Service Layer Pattern: Business logic separated into services
    `ProductService`: Product listing, filtering, search
    `CartService`: Cart management operations
  Thin Controllers: Controllers handle only request/response
  View Composers: Shared data across all views
  Trait Usage: `PaginationTrait` for reusable pagination logic

 Installation

 Prerequisites
  Docker & Docker Compose
  Git

 Setup
bash
 Clone the repository
git clone [repository url]
cd LES

 Start Docker containers
docker compose up  d

 Enter PHP container
docker compose exec php fpm bash

 Install dependencies
composer install
npm install

 Setup environment
cp .env.example .env
php artisan key:generate

 Run migrations
php artisan migrate

 Seed database (optional)
php artisan db:seed


 Development

 Commands
bash
 Development server
php artisan serve

 Run tests
php artisan test
composer test

 Code formatting
php artisan pint

 Build assets
npm run dev     Development with hot reload
npm run build   Production build

 Run all development tools concurrently
composer dev


 Docker Services
  nginx: Web server (port 80)
  php fpm: PHP application (port 9000)
  mysql: Database (port 3306)
    Credentials: test/test/test

 Debugging
Xdebug is configured and available on port 9003

 Project Structure

── app/
  ── Http/Controllers/     Thin controllers
  ── Services/             Business logic
  ── Models/               Eloquent models
  ── Traits/               Reusable traits
── resources/
  ── views/                Blade templates
  ── css/                  Stylesheets
  ── js/                   JavaScript files
── routes/
  ── web.php               Web routes
  ── ajax.php              AJAX endpoints
── public/
    ── css/style.css         Main stylesheet
    ── js/                   Static JS files


 Testing
bash
 Run all tests
php artisan test

 Run specific test
php artisan test   filter=TestName

 Clear config and run tests
composer test


 Contributing
1. Create a feature branch
2. Make your changes
3. Run tests and ensure they pass
4. Format code with `php artisan pint`
5. Submit a pull request

 License
This project is proprietary software.

 Support
For issues and questions, please contact the development team.