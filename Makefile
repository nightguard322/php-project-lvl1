install:
	composer install
brain-games:
	./bin/brain-games
game-even:
	./bin/brain-even
game-calc:
	./bin/brain-calc
validate:
	composer validate
autoload:
	composer dump-autoload
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

