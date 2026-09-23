up: docker-up
down: docker-down
restart: docker-down docker-up
init: docker-down-clear docker-pull docker-build docker-up project-init
project-init: project-composer-install project-wait-db project-migrations project-seeders project-assets-build

docker-up:
	docker compose up -d

docker-down:
	docker compose down --remove-orphans

docker-down-clear:
	docker compose down -v --remove-orphans

docker-pull:
	docker compose pull

docker-build:
	docker compose build

project-composer-install:
	docker compose run --rm php-cli composer install

project-wait-db:
	until docker compose exec -T mysql mysqladmin ping -h 127.0.0.1 -u root -ppassword --silent ; do sleep 1 ; done

project-migrations:
	docker compose run --rm php-cli php artisan migrate

project-seeders:
	docker compose run --rm php-cli php artisan db:seed

project-assets-build:
	docker run --rm -v $(shell pwd):/app -w /app node:lts-alpine npm run build
