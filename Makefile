start:
	docker compose up -d --no-recreate --remove-orphans

stop:
	docker compose stop

down:
	docker compose down

recreate: down
	docker compose up -d --force-recreate

build:
	docker compose build

clear: down
	docker system prune
	docker builder prune
	docker image prune
	docker container prune

up:
	docker compose up -d
	
stop-all:
	docker stop $$(docker ps -aq)
	
enter:
	docker compose exec php bash

create-project:
	docker compose exec php composer create-project symfony/skeleton:8.0.* .

restart: stop start

install:
	docker compose exec php composer install
	docker compose exec php chmod -R 777 .
	docker compose exec php php bin/console doctrine:database:create
	docker compose exec php sh -c "cp .php-cs-fixer.dist.php .php-cs-fixer.php"

fix:
	docker compose exec php ./vendor/bin/php-cs-fixer fix src
