

## Docker laravel react

A simple docker compose workflow for local laravel development with react js front end on inertia.

## Usage

To get started, make sure you have [Docker Desktop installed](https://docs.docker.com/desktop/) on your system, and then clone this repository.

Next, navigate in your terminal to the directory you cloned this and run the following commands:

- `docker-compose up -d --build`
- `docker-compose exec laravel.test composer install`
- `docker-compose exec laravel.test yarn install`

To build you assets during development run the command `docker-compose exec laravel.test yarn run dev` and `docker-compose exec laravel.test yarn run build` from production.

## Services

- **laravel.test** `:8000`
- **vite** `:5173`
- **mariadb** `:33069`
- **redis** `:6379`
- **elastic** `:9200`
- **kibana** `:5601`
- **mailhog** `:8025` and `:1025`
- **phpmyadmin** `:8080`

## Executing commands on a container

`docker-compose exec {container_name} command` for example to run `composer install` on laravel.test container `docker-compose exec laravel.test composer install`
