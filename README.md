# Have Fun Movies

Have Fun Movies is a VOD (Video On demand) application.

## Table of Contents

- [Technology](#technology)
- [Installation](#installation)
- [Docker Commands](#docker-commands)
- [Useful Artisan Commands](#useful-artisan-commands)
- [Useful Docker Commands](#useful-docker-commands)
- [Server Information](#server-information)
- [Project Managment](#project-managment)
- [Contributing](#contributing)
- [Important Links](#important-links)

## Technology

- Docker
- Php-7.2
- Laravel-5.8
- Mysql-5.7.22
- Nginx

## Installation

1. Install [docker](https://docs.docker.com/engine/installation/) and [docker-compose](https://docs.docker.com/compose/install/)
2. Run `docker-compose up -d`
3. Run `docker ps` to see all the running container

## Docker Commands

If you want, you can run composer or artisan through docker. For instance:
```bash
docker-compose exec app composer install
docker-compose exec app php artisan migrate
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan migrate:refresh --seed
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan db:seed --class=SeederClassName
```
Here `app` is the container/service name, if you want to go inside of any container, run this command:
```bash
docker-compose exec app bash
```
 Here is the list of container/service names:
 
 - app
 - db
 - webserver
 
## Useful Artisan Commands
```bash
php artisan migrate
php artisan config:clear
php artisan migrate:refresh --seed
php artisan db:seed
php artisan db:seed --class=SeederClassName
php artisan controller:make ControllerName
php artisan list
php artisan routes
php artisan down
php artisan up 
php artisan test 
php artisan view: publish
php artisan config:publish
```

## Useful Docker Commands
```bash
docker ps 
docker build -t my_container .
docker run my_image -it bash - Run Bash
docker volume ls  - List of Volumes
docker rm my_container - Removes one or more containers
docker rmi my_image - Removes one or more images
docker stop $(docker ps -a -q)  - stops all running containers
docker kill $(docker ps -q) - kill all running containers
docker rm $(docker ps -a -q) - delete all stopped containers
docker rmi $(docker images -q) - delete all images with 
docker logs -f <CONTAINER> // The -f or --follow option will show live log output.
```

## Server Information

`Backend-IP` : `159.203.45.240`

## System Architecture

> Detailed information about each service can be found in service folder.

## Project Managment

Please go to this youTrack link [YouTrack](https://wolverinesolutions.myjetbrains.com).

## Contributing

Please contribute using [Github Flow](https://guides.github.com/introduction/flow/). Create a branch, add commits, and [open a pull request](https://github.com/hitman3r44/haveFunMovies-Backend/compare).

## Important Links

 - [Docker Compose Cheat Sheet](https://gist.github.com/buonzz/054304b3145323c34ed05cb65f1b174f)
 - [](https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose)
