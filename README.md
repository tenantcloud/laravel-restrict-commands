### About

Laravel package to restrict execution some commands in production, staging environments

### Installation

In your `composer.json`, add this repository:

```
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/tenantcloud/laravel-restrict-commands"
    }
],
```

Then run `composer require tenantcloud/laravel-restrict-commands` to install the package.

### Commands

Install dependencies: `docker run -it --rm -v $PWD:/app -w /app composer install`

Run tests: `docker run -it --rm -v $PWD:/app -w /app php:8.1-cli vendor/bin/phpunit`

Run cs-fix: `docker run -it --rm -v $PWD:/app -w /app composer cs-fix`

Run phpstan: `docker run -it --rm -v $PWD:/app -w /app composer phpstan`
