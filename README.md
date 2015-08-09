# Laravel lumen and AngularJS Todo Application

Todo application using Laravel lumen micro framework and AngularJS

## Features

- Create/Edit/Delete Todo
- Lumen Rest API
- AngularJS Form Validation
- AngularJS CSRF Protection
- Search Todos
- Sort Todos
- Complete Todos

## Screenshots

![Alt text](/public/images/todos_all.png?raw=true)

![Alt text](/public/images/update_todo.png)

## Getting Started

Clone Repo

````
git clone https://github.com/DimitriMikadze/Lumen-Angular-Todo.git
````

Add .env file to root directory, Example: 

````
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeSecret

DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=todos
DB_USERNAME=databaseusername
DB_PASSWORD=databasepassword

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=database
````

Migrate todos table

````
php artisan migrate
````

Start Server

````
php artisan serve
````

## Lumen 

lumen rest api is located in routes.php file, app/Http/routes.php

## Angular Files

you can find angular files in, public/js

## Contributing

contributions are more than welcome!

## License

See license.txt