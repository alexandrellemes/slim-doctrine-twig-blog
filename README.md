# Slim-Doctrine-Twig

This is blog that uses a simple implementation of Slim3 with Doctrine2 and Twig

Based on [slimphp/Slim-Skeleton](https://github.com/slimphp/Slim-Skeleton)

## Install the Application

- Clone this repository
- Configure your database info in src/settings.php
- Run `composer install`
- Run `php vendor/bin/doctrine orm:schema-tool:update -f`
- Run `cd public && php -S 127.0.0.1:8080`

That's it! Now go build something cool.
