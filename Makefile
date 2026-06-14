#CONSTANTS
COMPOSE_ENV := ./docker/.env
COMPOSE_FILE := ./docker/docker-compose.yml
DOCKER_COMPOSE := docker compose -f $(COMPOSE_FILE) --env-file $(COMPOSE_ENV)

#COMMANDS
.PHONY: up up-recreate down restart build
up:
	@$(DOCKER_COMPOSE) up -d

up-recreate:
	@$(DOCKER_COMPOSE) up -d --force-recreate

down:
	@$(DOCKER_COMPOSE) down

restart:
	@$(DOCKER_COMPOSE) restart

build:
	@$(DOCKER_COMPOSE) build --no-cache $(c)

.PHONY: app nginx
app:
	@clear
	@printf '\033]0;[container] app\a'
	@docker exec -it --user app app sh

nginx:
	@clear
	@printf '\033]0;[container] nginx\a'
	@docker exec -it nginx sh
