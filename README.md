# inventory_system
inventory system to send the email regarding product quantity and expire date to the specific user and scheduled the cron for all user

below are some step to setup and run the project as well test the functionality

1)set the project on proper folder
xampp-htdoc folder
wamp-www folder

2)change the env file
-add database name username and password in env file
-set you email account smtp credential to send the message
-set low quantity and expire day count in env file

3)run migration command to create database
-php artisan migrate

4)run seeder command to for sample user id's
-php artisan db:seed --class=UserSeederCommand
-check and get id and password form seeder file

5)login with provided  id or create new user

6)add some products for the testing,
-products are depend on users so please create products before test

7)run dashboard scheduler
-this scheduler will run only for specific login user only

8)run cronjob through command line
-php artisan schedule:run
-it send all user specifice mail for inventory update
-send product quantity mail
-send product lot expire mail

