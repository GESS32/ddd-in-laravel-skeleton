# CONSTANTS
COMPOSE_ENV := ./docker/.env
COMPOSE_FILE := ./docker/docker-compose.yml
DOCKER_COMPOSE := docker compose -f $(COMPOSE_FILE) --env-file $(COMPOSE_ENV)

.DEFAULT_GOAL := help

# COMMANDS
.PHONY: help
help: ## Show available make commands.
	@awk 'BEGIN {FS = ":.*##"; printf "Usage:\n  make <target>\n\nTargets:\n"} /^[a-zA-Z0-9_-]+:.*##/ {printf "  \033[36m%-14s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.PHONY: up up-recreate down restart build
up: ## Start Docker Compose services in the background.
	@$(DOCKER_COMPOSE) up -d

up-recreate: ## Recreate and start Docker Compose services in the background.
	@$(DOCKER_COMPOSE) up -d --force-recreate

down: ## Stop and remove Docker Compose services.
	@$(DOCKER_COMPOSE) down

restart: ## Restart running Docker Compose services.
	@$(DOCKER_COMPOSE) restart

build: ## Rebuild Docker images without cache. Use c=<service> to target one service.
	@$(DOCKER_COMPOSE) build --no-cache $(c)

.PHONY: app nginx
app: ## Open a shell in the app container as the app user.
	@clear
	@printf '\033]0;[container] app\a'
	@docker exec -it --user app app sh

nginx: ## Open a shell in the nginx container.
	@clear
	@printf '\033]0;[container] nginx\a'
	@docker exec -it nginx sh
