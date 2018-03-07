# poc1_ListofPharmaceuticalProducts
This is a Proof of Concept developed with Php/Laravel

# Install
```
$ mysql -u root -p
$ GRANT ALL PRIVILEGES ON *.* TO 'poc'@'localhost' IDENTIFIED BY 'poc';
$ CREATE DATABASE poc;
$ \q;

$ git clone https://github.com/andersenmp/poc1_ListofPharmaceuticalProducts.git

$ cd poc1_ListofPharmaceuticalProducts
$ composer install
$ composer require "subfission/cas":"dev-master"
$ php artisan vendor:publish
$ php artisan migrate
$ php artisan serve
```