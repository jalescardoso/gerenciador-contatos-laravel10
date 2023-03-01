# create table to migration
php artisan make:migration create_pessoas_table --table=pessoas --create

# This will create our resource controller with all the methods we need.
php artisan make:controller PessoaController --resource 

# Running Migrations
php artisan migrate
