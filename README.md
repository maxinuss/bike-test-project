# bike-test-project

#### Folder structure
This project is built using Docker and PHP 7.2 with a DDD approach. 
This leads to three main folders: (https://en.wikipedia.org/wiki/Domain-driven_design)
* *Application*: services to interact with the domain of the application.
* *Domain*: entities, domain exceptions and interfaces to handle domain layer.
* *Infrastructure*: concrete implementations of the domain.
#### Build Docker image
Run this command on project root
```
docker build -t bike-php-project .
```

#### Run Docker image and bind with app  source
* Use any available port eg. 5720
* Use code path. eg: C:\xampp\htdocs\test-project or /home/user/test-project
```
docker run --name bike-php-container  -p 5720:80 -v C:\xampp\htdocs\test-project:/var/www/html -d bike-php-project
```

#### Run container bash
```
docker exec -it bike-php-container /bin/sh
```
Inside Docker go to /var/www/html and run:
```
composer install
```

### Unit Testing
Inside Docker, run this command in project root folder (/var/www/html)
```
./vendor/phpunit/phpunit/phpunit --verbose tests_UnitTest_RentalService_RentalServiceTest
```