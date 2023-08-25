1. Clone project using below command
git clone https://github.com/farhad-nstu/bf-lab.git 

2. Install/Update composer using below command
composer install

3. If composer install not work then run below command
composer update

4. Setup the environment with databse

5. Run below migration command with seed
php artisan migrate --seed

6. Then you find several user
admin@gmail.com, superadmin@gmail.com (Both have all access in application)
user@gmail.com, moderator@gmail.com (Only task related access is given)
For both use password (all in small letter) as password
