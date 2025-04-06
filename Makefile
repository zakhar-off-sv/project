up: docker-up
down: docker-down
restart: docker-down docker-up
init-pull: docker-network docker-down-clear docker-pull docker-build docker-up
init: docker-network docker-down-clear docker-build docker-up

docker-network:
	docker network create --driver=bridge --opt com.docker.network.driver.mtu=1440 --subnet=192.168.222.0/24 project-network || true

docker-up:
	docker compose up -d

docker-down:
	docker compose down --remove-orphans

docker-down-clear:
	docker compose down -v --remove-orphans

docker-stop:
	docker compose stop

docker-pull:
	docker compose pull

docker-build:
	docker compose build

setown:
	sudo chown -R `id -u`:`id -g` app
