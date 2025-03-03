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

install:
	composer install