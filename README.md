# bike-test-project

#### Folder structure
This project is built using a DDD approach. 
This leads to three main folders: (https://en.wikipedia.org/wiki/Domain-driven_design)
* *Application*: uses cases, entrypoint to interact with the domain of the application. In order to *execute* a use case, there will be necessary to provide a dedicated request.
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