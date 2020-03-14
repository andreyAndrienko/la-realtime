PHP_APP=app_la_realtime

init:
	docker network create la_realtime || true
	docker-compose up -d --build
	docker-compose exec $(PHP_APP) composer install
	docker-compose exec $(PHP_APP) php artisan migrate --seed
	docker-compose exec $(PHP_APP) php artisan storage:link
	docker-compose exec $(PHP_APP) php artisan key:generate --ansi

start:
	docker-compose up -d
	docker-compose exec $(PHP_APP) composer install
	docker-compose exec $(PHP_APP) php artisan migrate

stop:
	docker-compose stop

down:
	docker-compose down

bash:
	docker-compose exec $(PHP_APP) bash
