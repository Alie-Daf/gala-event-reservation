# GÁLA — Event Reservation System

GÁLA is a Laravel-based event reservation system. The source project includes customer-facing pages, reservation workflows, account registration/login, admin tools, blocked dates, reports, and reviews.

## Technology requirements

- PHP **8.3 or newer** (the supplied `composer.json` requires PHP `^8.3`)
- Laravel **13.x** (the supplied `composer.json` requires `laravel/framework ^13.7`)
- Composer
- Node.js and npm (for Vite frontend assets)
- A database supported by the project (the supplied SQL export was MariaDB/MySQL)

## Local setup

1. Install PHP 8.3+, Composer, Node.js, npm, and MySQL/MariaDB.
2. Copy `.env.example` to `.env`.
3. Configure the database connection in `.env`.
4. Set a new private `ADMIN_REGISTRATION_CODE` in `.env`. Do not reuse the old code from the original project.
5. Install dependencies and build assets:

   ```bash
   composer install
   npm install
   npm run build
   php artisan key:generate
   php artisan migrate
   php artisan storage:link
   php artisan serve
   ```

6. Open the local URL shown by `php artisan serve`.

## Database

The project contains Laravel migrations under `database/migrations/`. Use migrations to create a fresh database.

The separately supplied `database(1).sql` export was intentionally **not included** in this public-ready package. It contains existing user accounts, reservation contact details, session records, and password hashes. Do not publish that raw database export in a public repository. If existing records are needed for a demo, create a sanitized demo database with fictional data first.

## Admin registration code

The admin registration code is now read from the `ADMIN_REGISTRATION_CODE` environment variable instead of being hard-coded in the PHP controller.

- Set a new value in your private local `.env` or hosting environment variables.
- Never commit `.env`.
- Do not publish the admin code in README files, screenshots, or source code.
- If the environment variable is unset, admin-code verification fails closed.

## GitHub safety

Do not commit `.env`, real customer data, database dumps containing personal information, logs, cached files, `vendor/`, or `node_modules/`. The repository `.gitignore` excludes common local and generated files.

## Deployment note

This is a Laravel backend application, not a static HTML site. GitHub Pages cannot run its PHP routes, authentication, database operations, or reservation workflows. Use GitHub for source-code hosting and a PHP-capable host for a live interactive demo.
