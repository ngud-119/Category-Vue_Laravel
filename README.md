![A](https://user-images.githubusercontent.com/59705964/220126817-09e4a7c9-e294-4882-9d72-463b4038f1e5.png)

![B](https://user-images.githubusercontent.com/59705964/220126921-a6f84c6d-786a-499d-a0d2-5a804c5bac56.png)

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## How To Use The Application

Open your teminal and type this commands :

- git clone git@github.com:touzaelhassan/LARAVEL-VUE-APPLICATION.git
- cd LARAVEL-VUE-APPLICATION
- composer install

#### 1 - Database :

- Create a mysql database in phpmyadmin
- Add database name and credentials to .env file => cp .env.example .env

#### 2 - Backend :

- php artisan key:generate
- php artisan migrate
- php artisan serve
- Go To : http://localhost:8000

#### 3 - Frontend :

- npm install
- npm run dev

#### 4 - Creating a product from the command line :

- php artisan product:add "Product Name" "Product Description" "Product Price" "Caterory Id"

