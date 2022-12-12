# Сокращения и комбинации команд
init: docker-build docker-up examples-init

up: docker-up
down: docker-down
debug: examples-debug

# Команды для инициализации проекта
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

# Команды для запуска скриптов с примерами
examples-simple:
	docker-compose run --rm examples-php-cli php examples/01-simple/01-simple.php

examples-custom:
	docker-compose run --rm examples-php-cli php examples/02-custom/02-custom.php

examples-conflict:
	docker-compose run --rm examples-php-cli php examples/03-conflict/03-conflict.php

examples-populate:
	docker-compose run --rm examples-php-cli php examples/04-populate/04-populate.php

examples-errors-collecting:
	docker-compose run --rm examples-php-cli php examples/05-errors-collecting/05-errors-collecting.php

examples-complex:
	docker-compose run --rm examples-php-cli php examples/06-complex/06-complex.php
