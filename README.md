# Mintos test

### Installing

A step by step series of examples that tell you have to get a development env running

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
