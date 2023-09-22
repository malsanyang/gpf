

## Docker laravel react

A simple docker compose workflow for local laravel development with react js front end on inertia.

## Usage

To get started, make sure you have [Docker Desktop installed](https://docs.docker.com/desktop/) on your system, and then clone this repository.

Next, navigate in your terminal to the directory you cloned this and run the following commands:

- `docker-compose up -d --build`
- `docker-compose exec app composer install`
- `docker-compose exec app yarn install`
- `docker-compose exec app php artisan key:generate`
- `docker-compose exec app php artisan migrate`
- `docker-compose exec app php artisan db:seed`

To build you assets during development run the command `docker-compose exec app yarn run dev` and `docker-compose exec app yarn run build` from production.

## Services

- **app** `:8000`
- **vite** `:5173`
- **mariadb** `:33069`
- **phpmyadmin** `:8080`

## Executing commands on a container

`docker-compose exec {container_name} command` for example to run `composer install` on app container `docker-compose exec app composer install`
