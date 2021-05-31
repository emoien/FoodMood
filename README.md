## Machine setup

- Install composer in your local machine
- install php 7.3 or greater
- xampp or wampp server

# Project setup

- clone the project
- cd into FoodMood and run the command

```
composer install
```

- copy env.example to .env
- set the database credentials i.e. database name, username and password
- run the following command

```
  php artisan key:generate
```

```
  php artisan migrate
```