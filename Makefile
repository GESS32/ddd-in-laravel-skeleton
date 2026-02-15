.PHONY: up
up:
	@clear
	@docker-compose -f ./docker/docker-compose.yml --env-file ./docker/.env up

.PHONY: app
app:
	@clear
	@docker exec -it --user app app sh
