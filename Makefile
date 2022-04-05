install:
	composer install
brain-games:
	php ./bin/brain-games
validate:
	composer validate
autoload:
	composer dump-autoload
lint:
	phpcs -- --standard=PSR12 src bin
