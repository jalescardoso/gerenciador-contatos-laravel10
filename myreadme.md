# create table to migration
php artisan make:migration create_pessoas_table --table=pessoas --create

# This will create our resource controller with all the methods we need.
php artisan make:controller PessoaController --resource 

# Running Migrations
php artisan migrate

# globally installing the Laravel
composer global require laravel/installer

# generate crypto key
php artisan key:generate



# build to production
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan route:clear

php artisan optimize:clear

# create form request
php artisan make:request PessoaPostRequest

php artisan make:controller jalesController --model=jales --resource --requests