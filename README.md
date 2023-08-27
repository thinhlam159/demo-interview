## Required Environments
- PHP: 8.1.x 
- Laravel: 9.x 
- MySQL: 8.0
- Composer: 2.2.x
- Node: 16.19.x
- NPM: 9.4.x

### Run laravel
- create mysql user, database
- copy .env.example to .env
- edit the .env file according to the previously created mysql user and database then run command below in terminal
- php composer update
- php composer install
- php artisan migrate
- php artisan key:generate
- php artisan db:seed
- php artisan serve

### Run reactjs
- cd react
- npm -i
- npm run dev
- access in your web browser at: http://localhost:3000/user/list
