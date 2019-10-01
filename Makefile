.PHONY: help

CONSOLE=php bin/console
PHPUNIT=bin/phpunit

## Colors
COLOR_RESET			= \033[0m
COLOR_ERROR			= \033[31m
COLOR_INFO			= \033[32m
COLOR_COMMENT		= \033[33m
COLOR_TITLE_BLOCK	= \033[0;44m\033[37m

## Help
help:
	@printf "${COLOR_TITLE_BLOCK}Makefile help${COLOR_RESET}\n"
	@printf "\n"
	@printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	@printf " make [target]\n\n"
	@printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	@awk '/^[a-zA-Z\-\_0-9\@]+:/ { \
		helpLine = match(lastLine, /^## (.*)/); \
		helpCommand = substr($$1, 0, index($$1, ":")); \
		helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
		printf " ${COLOR_INFO}%-16s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)

## Display test with web/coverage
test:
	$(PHPUNIT) --coverage-html web/test-coverage --coverage-text --colors=never

## Drop, rebuild & loading fixtures
boot-db:
	$(CONSOLE) doctrine:database:drop --force --if-exists
	$(CONSOLE) doctrine:database:create
	$(CONSOLE) doctrine:schema:update --force
	$(CONSOLE) doctrine:fixtures:load --no-interaction
	$(CONSOLE) doctrine:schema:validate
	$(CONSOLE) cache:clear

## Autowiring Debug
autowire:
	$(CONSOLE) debug:autowiring

## Route debug
router:
	$(CONSOLE) debug:router

## Container debug
container:
	$(CONSOLE) debug:container

## Clear your cache
cc:
	$(CONSOLE) && $(CONSOLE) cache:clear --no-warmup || rm -rf var/cache/*

## Yarn install
yarn:
	yarn install

## Yarn run
yarn-watch:
	yarn run encore dev --watch

## Yarn run production
yarn-watch-prod:
	yarn run encore production

## Launch random draw command
random-draw:
	$(CONSOLE) app:random-draw
