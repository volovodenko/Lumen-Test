## Run the project

composer install
copy .env.example to .env
set APP_KEY in .env
php artisan jwt:secret
php artisan migration:run
php artisan db:seed

## Description

Test Lumen

