# Management Value of Assets

Dev setup (first time only):

-   clone this repo
-   edit `.env` file
    -   database username
    -   database password
    -   database name
-   run `composer install` or `composer update`
-   run `php artisan key:generate`

-   run `php artisan migrate:fresh` (or `php artisan migrate:fresh --seed` if dummy data is required) OR :

I suggest to add your database manual instead. with:

-   create database on phpmyadmin
-   import sql file on database folder
-   ready
-   php artisan serve

NOTE:
please check MANUAL BOOK for your future instructions.
if you want to improve this applications, please kindly text me first and i'll be happy to add `dev` branch for your push.

Dev lifecycle:

-   check for repo updates
-   run `git pull`
-   If there is a new dependency: run `composer update`
-   If there is a change in the migrations: run `php artisan migrate`

-   Do your stuff
-   Commit and push to the `dev` branch, **not** `master` branch!
