up:
	docker-compose up -d

up-bg:
	docker-compose up

# Brings down containers without removing database data
down:
	docker-compose down

ps:
	docker-compose ps 

# Deletes all database data
clean:
	docker-compose down --volumes

logs:
	docker-compose logs -f

sh:
	docker exec -it wp_yimd_wordpress_1 bash
