# bike-test-project

### Context

A company rents bikes under following options:
1. Rental by hour, charging $5 per hour
2. Rental by day, charging $20 a day
3. Rental by week, changing $60 a week
4. Family Rental, is a promotion that can include from 3 to 5 Rentals (of any type) with a discount of 30% of the total price

### Assigment:
1. Implement a set of classes to model this domain and logic
2. Add automated tests to ensure a coverage over 85%
3. Use GitHub to store and version your code
4. Apply all the recommended practices you would use in a real project
5. Add a README.md file to the root of your repository to explain: your design, the development practices you applied and how run the tests.

Note: we don't expect any kind of application, just a set of classes with its automated tests.


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
Inside Docker Container go to /var/www/html and run:
```
composer install
```

### Unit Testing
Inside Docker Container, run this command in project root folder (/var/www/html)
```
./vendor/phpunit/phpunit/phpunit --verbose tests_UnitTest_RentalService_RentalServiceTest
```