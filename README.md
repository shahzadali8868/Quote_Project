## About Project
Project :Show Random 5 Quotes with Authentication Page Using API


Tecnologies Used : Laravel 8, Mysql, Php- 7.3, HTML, CSS, Bootstrap Framework

## Steps for use this Project
first clone the project run command

//git clone https://github.com/shahzadali8868/Quote_Project.git 

or download zip file from reposetry , Open in any editor and go to terminal 

after that Run Command

//composer install

import the database file "quote_project"(same database name configration in .env file) 

or create database "quote_project", run #php artisan migrate

database file exist in root directry

database configration in .env file


DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=quote_project

DB_USERNAME=root

DB_PASSWORD=

you can change configration according your database


Start the development server: 

#php artisan serve

if any error accur 

Install dependencies, run command: composer install or composer dump-autoload

hit url on the browser: http://localhost:8000/

## Login Crediential
Email = shahzad@gmail.com

password = 12345678

You can also Register new user 

run command for check Test Cases

#php artisan test


## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
