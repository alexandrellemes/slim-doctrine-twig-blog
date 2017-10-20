# Slim-Doctrine-Twig

Esse blog foi implementado em Slim3, Doctrine 2 e Twig.


Baseado no [slimphp/Slim-Skeleton](https://github.com/slimphp/Slim-Skeleton)

## Como instalar a aplicação

- Clone este repositório
- Configure a base de dados em src/settings.php
- Execute `composer install`
- Execute `mysql -u root -p -e "create database slim_doctrine_twig; GRANT ALL PRIVILEGES ON slim_doctrine_twig.* TO sdtwig_user@localhost IDENTIFIED BY '123456'"`
- Execute `php vendor/bin/doctrine orm:schema-tool:update -f`
- Digite `cd public && php -S 127.0.0.1:8080`

Aproveitem!!!
