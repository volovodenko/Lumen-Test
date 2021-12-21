## Description

Test Lumen

## Run the project

composer install<br />
copy .env.example to .env<br />
set APP_KEY in .env<br />
set DB variables in .env<br />
set MAIL variables in .env<br />
php artisan jwt:secret<br />
php artisan migration:run<br />
php artisan db:seed<br />
