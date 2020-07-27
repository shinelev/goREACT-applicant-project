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
* Using composer just run command `composer global require laravel/installer` to install Laravel
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
* If the problem still appears try to generate new key ` php artisan key:generate --show`, copy new key value
and put into `.env` file after `APP_KEY=`.

### Test run

Project contains several simple test. To run them make following command `php artisan test`.

### Demo video

Handmade demo video is available in [youtube](https://youtu.be/c9Ls5YA283U)
