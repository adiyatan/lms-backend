# Laravel 11 Project

This is a web application built with [Laravel 11](https://laravel.com/), a powerful PHP framework for modern web applications.

## Requirements

Make sure your environment meets the following requirements:

-   **PHP**: 8.3.9
-   **Composer**: Latest version
-   **MySQL**: 8.0+ (or other supported databases)
-   **Node.js**: v16+
-   **npm/yarn**: 6.0+

You can check your PHP version by running:

```sh
php -v
```

## Getting Started

### 1. Clone the repository

```sh
git clone <repository-url>
cd <project-directory>
```

### 2. Install dependencies

```sh
composer install
npm install
```

### 3. Configure the environment

Copy `.env.example` to `.env` and update the necessary environment variables:

```sh
cp .env.example .env
```

Update the `.env` file to match your database and application settings:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Generate the application key

```sh
php artisan key:generate
```

### 5. Run database migrations

```sh
php artisan migrate
```

### 6. Start the development server

```sh
php artisan serve
```

Your application will be accessible at `http://localhost:8000`.

### 7. Compile assets (if using Laravel Mix or Vite)

```sh
npm run dev
```

## Project Structure

```
├── app/             # Application core code (Models, Controllers)
├── bootstrap/       # Framework bootstrap files
├── config/          # Configuration files
├── database/        # Migrations, seeders, and factories
├── public/          # Public assets (CSS, JS, images)
├── resources/       # Views, components, and frontend assets
├── routes/          # Route definitions
├── storage/         # Logs and compiled files
└── tests/           # Test cases
```

## Common Commands

-   `php artisan migrate`: Run database migrations
-   `php artisan db:seed`: Seed the database with test data
-   `php artisan make:model ModelName`: Create a new model
-   `npm run dev`: Compile frontend assets for development
-   `npm run build`: Compile frontend assets for production

## Deployment

For production deployment:

1. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`.
2. Run:
    ```sh
    composer install --optimize-autoloader --no-dev
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    npm run build
    ```
3. Ensure correct permissions on the `storage` and `bootstrap/cache` directories:
    ```sh
    chmod -R 775 storage bootstrap/cache
    ```

## Tech Stack

-   **PHP**: 8.3.9
-   **Laravel**: 11.x
-   **MySQL**: Database
-   **Node.js** & **npm/yarn**: Frontend asset management
-   **Composer**: Dependency management

## License

This project is licensed under the MIT License. Feel free to use it for your own projects!
