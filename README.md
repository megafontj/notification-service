# Install and Set up laravel with docker compose

## Install and run
1. git clone https://github.com/megafontj/skeleton.git ./your-folder
2. docker compose up
3. docker compose exec app composer install
4. docker compose exec npm install

## Environment file
copy `.env.example` to `.env` and fill the setting if needed

```yaml
MYSQL_DATABASE=your-database-name
MYSQL_PASSWORD=your-password

PHPMYADMIN_PORT=3400 # set port for phpmyadmin if 3400 is used by another app
NGINX_PORT=8080 # port for nginx
DB_PORT=3306 # port for database
APP_PORT=9001 # port for laravel app 
```

## Laravel
Laravel is inside the `src` folder. If you want to run artisan command use this command:

`docker compose exec app php artisan {your command}`