init: docker-build docker-up examples-init

up: docker-up
down: docker-down
debug: examples-debug

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-build:
	docker-compose build

examples-init: examples-composer-install examples-composer-dump

examples-composer-install:
	docker-compose run --rm examples-php-cli composer install

examples-composer-dump:
	docker-compose run --rm examples-php-cli composer dump-autoload

examples-debug:
	docker-compose run --rm examples-php-cli php debug/index.php
