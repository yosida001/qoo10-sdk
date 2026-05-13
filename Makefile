DOCKER_COMPOSE ?= docker compose
PHP_SERVICE ?= php
PHPUNIT ?= vendor/bin/phpunit

.PHONY: test
test:
	$(DOCKER_COMPOSE) run --rm $(PHP_SERVICE) $(PHPUNIT) --configuration phpunit.xml.dist

.PHONY: composer-install
composer-install:
	$(DOCKER_COMPOSE) run --rm $(PHP_SERVICE) composer install
