# Laravel Sail Makefile

# Variables
SAIL = ./vendor/bin/sail

# Commands
up: $(SAIL) up -d

down: $(SAIL) down

rebuild:
    $(SAIL) build --no-cache
    $(SAIL) up -d

install:
    composer install
    $(SAIL) npm install

bash: $(SAIL) bash
