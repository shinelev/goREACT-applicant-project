# GoReact Applicant Project

Required versions:
- PHP: 7.3.20
- Laravel: 7.21.0
- Node.js: 12.18.3

### Run project:

* First of all you should have to install PHP interpreter v.7.3 and MySQL database engine.
    - the most convenient way is to use [XAMPP package](https://www.apachefriends.org/download.html)
    - or 
    - use [Laravel Homestead](https://laravel.com/docs/7.x/homestead)
    - or
    - use PHP installed locally [from official site](https://www.php.net/downloads)

* Then you need to install packet manager - [Composer](https://getcomposer.org/download/)
* Then run command `composer install` to install all dependencies for project work.
* After that you need to create a new database in MySQL (you can run it in XAMPP control panel) with a
 name `laravel` and collation `utf8mb4_unicode_ci`.
    - you can use your own MySQL client (i.e. [DBeaver](https://dbeaver.io/))
    - or 
    - use [phpMyAdmin](http://localhost/phpmyadmin/) from XAMPP panel.
* Next step will be creating required tables. Run command `php artisan migrate` from the project directory.
* Also, you need to create a symbolic link for uploaded files. Run command `php artisan storage:link`.
* Next big step is to install `node.js`. Follow instructions from [official site](https://nodejs.org/en/).
* Run command `npm install` to retrieve all dependencies for frontend part of project.
* Then you need to run backend server. Use `XAMPP`, `Homestead` or if you have PHP on you machine just run
 development server via command `php artisan serve`
* ~~Follow the white rabbit~~ and open [link](http://127.0.0.1:8000) in your browser.

### Workarounds

* If there is a runtime exception `No application encryption key has been specified.`. You need to run 
command `php artisan key:generate` and restart server.
* If the problem still appears, try to generate new key ` php artisan key:generate --show`, copy new key value
and put into `.env` file after `APP_KEY=`.

### Test run

Project contains several simple test. To run them make following command `php artisan test`.

### Demo video

Handmade demo video is available in [youtube](https://youtu.be/c9Ls5YA283U)

### Docker

If you have already installed [Docker](https://www.docker.com/) on your machine it could be used for running 
this project.
* Run docker with command `docker-compose up -d`.
* Then exec generate new key inside container via command `docker-compose exec app php artisan key:generate`.
* Next you should run command `docker inspect goreact-applicant-project_app-network` and find in terminal something
common with these strings:
```
"59c20df9cf0ce9bd45fbc79ef2d5c73f469f6844ce0f858a4b3697e44992bc14": {
                "Name": "db",
                "EndpointID": "9d9ca09810ca95b939f6419b5a61cb333c7bb4c3e0859d20c1e2a76cb8e7a007",
                "MacAddress": "02:42:ac:14:00:02",
                "IPv4Address": "172.20.0.2/16",
                "IPv6Address": ""
            },
```
* You need to copy IP address of database. In text above it is `"IPv4Address": "172.20.0.2/16"`. Copy IP address value
without `/` and put it into `.env` file in root folder after string `DB_HOST=`. As result, you will get something like
this:
```
DB_HOST=172.20.0.2
```
* Also, you need to add a password to DB. To do this you should add value `YOUR_MYSQL_PASSWORD` to key `DB_PASSWORD=` in 
`.env` file.
* Check your database section in `.env` file. It should be like this:
```
DB_CONNECTION=mysql
DB_HOST=172.20.0.2
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=YOUR_MYSQL_PASSWORD
```
* Finally, run command `docker-compose exec app php artisan migrate` to create tables in DB inside docker.
* Open your browser and go to `http://localhost:8888/`.
* To stop docker run command `docker-compose down -v`.
