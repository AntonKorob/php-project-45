# Makefile
up: # разворачивание и запуск
	cp -n .env.example .env
	touch database/database.sqlite
	composer install
	npm install
	php artisan key:generate
	php artisan migrate --seed
	heroku local -f Procfile.dev # запуск проекта

test:
	php artisan test

.PHONY: test

.PHONY: install

brain-game:
		php bin/brain-game.php
		
brain-game:
		php bin/brain-even.php

install:
	composer install

line:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

validate:
	composer validate