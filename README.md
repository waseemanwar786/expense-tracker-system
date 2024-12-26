Project Setup Instructions
Clone the Repository
Ensure you have Composer installed, then run: composer install
Generate Application Key: php artisan key:generate
Install Frontend and Authentication (Laravel Breeze)
    php artisan breeze:install
    npm run dev
    php artisan migrate
Run Database Migrations: php artisan migrate
Seed the Database (for category):php artisan db:seed
Start the Development Server: php artisan serve
Dependencies:
    maatwebsite/excel: Used for importing/exporting Excel files.
    laravel/breeze: Provides simple authentication scaffolding.
