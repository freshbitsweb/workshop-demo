## Work shop Demo

### Installation

- Clone the repo:

```
git clone https://github.com/freshbitsweb/workshop-demo.git [DIRECTORY_NAME]
```

- Create .env file from the example file:

```
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

- Setup .env variables (Mainly APP_URL and DB_DATABASE)

- Run following commands:

```
composer install
php artisan key:generate
php artisan migrate --seed
```
Done.