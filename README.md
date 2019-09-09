## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Installing

Clone this repository
```
git clone git@github.com:FaZeRs/mintos-test.git
```

#### With Docker

Build containers
```
docker-compose up -d --build
```

Access docker environment
```
docker-compose exec php sh
```

Run this command inside terminal to create .env file, install dependencies, generate key and run migrations. 
```
composer start
```

To install javascript dependencies and compile assets run this command
```
npm run start
```

The application will be available on http://localhost:8000

## Running the tests

```
composer test
```

## Built With

* [Laravel](https://laravel.com/)
* [Vue](https://vuejs.org)
* [Inertia.js](https://inertiajs.com/)
* [Docker](https://www.docker.com/)

## Authors

* **Nauris Linde** - *Initial work* - [FaZeRs](https://github.com/FaZeRs)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
