# Package name

Description

### Commands

Install dependencies: `docker run -it --rm -v $PWD:/app -w /app composer install`

Run tests: `docker run -it --rm -v $PWD:/app -w /app php:8.1-cli vendor/bin/phpunit`

Run cs-fix: `docker run -it --rm -v $PWD:/app -w /app composer cs-fix`

Run phpstan: `docker run -it --rm -v $PWD:/app -w /app composer phpstan`
