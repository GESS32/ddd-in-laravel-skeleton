# CONSTANTS
COMPOSE_ENV := ./docker/.env
COMPOSE_FILE := ./docker/docker-compose.yml
DOCKER_COMPOSE := docker compose -f $(COMPOSE_FILE) --env-file $(COMPOSE_ENV)

#COMMANDS
.PHONY: up up-recreate down restart build
up:
	@clear
	@$(DOCKER_COMPOSE) up -d

up-recreate:
	@clear
	@$(DOCKER_COMPOSE) up -d --force-recreate

down:
	@$(DOCKER_COMPOSE) down

restart:
	@$(DOCKER_COMPOSE) restart

build:
	@clear
	@$(DOCKER_COMPOSE) build --no-cache $(c)

.PHONY: app nginx
app:
	@clear
	@docker exec -it --user app app sh

nginx:
	@clear
	@docker exec -it nginx sh
