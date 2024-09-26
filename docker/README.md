# Docker containers for Joomla 4 & 5

## Information
- Current Joomla Version: 4.0, 4.1, 4.2, 4.3, 4.4, 5.0, 5.1
- PHP Versions: 7.2, 7.3, 7.4, 8.0, 8.1, 8.2
- MySQL Version: 5.7 (Joomla 4), 8.0 (Joomla 5)

## Pre-Requisites
- install docker-compose [http://docs.docker.com/compose/install/](http://docs.docker.com/compose/install/)

## Usage
Start the container:
- ```docker-compose --env-file envs/<env-file> up```

Stop the container:
- ```docker-compose --env-file envs/<env-file> stop```

Destroy the container and start from scratch:
- ```docker-compose --env-file envs/<env-file> down -v```

## Plugin setup
You can follow the instruction in the [Joomla Github Repo](https://github.com/tawk/tawk-joomla)
