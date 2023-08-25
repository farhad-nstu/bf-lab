# Clone project using below command
git clone https://github.com/farhad-nstu/bf-lab.git 

# Install/Update composer using below command
composer install

# If composer install not work then run below command
composer update

# Setup the environment with databse

# Run below migration command with seed
php artisan migrate --seed

# Then you find several user
admin@gmail.com, superadmin@gmail.com (Both have all access in application)
user@gmail.com, moderator@gmail.com (Only task related access is given)
For both use password (all in small letter) as password
