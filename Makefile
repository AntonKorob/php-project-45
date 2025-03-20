# Makefile
install:
	composer install

brain-calc:
	php bin/brain-calc
brain-even:
	php bin/brain-even
brain-games:
	php bin/brain-games
brain-gcd:
	php bin/brain-gcd
brain-prime:
	php bin/brain-prime
brain-progression:
	php bin/brain-progression

.PHONY: test

.PHONY: line

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

.PHONY: install

validate:
	composer validate

test:
	php artisan test

