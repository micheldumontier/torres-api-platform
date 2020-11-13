#!/bin/bash

# git pull
docker-compose -f docker-compose-prod/docker-compose.build.yml pull --ignore-pull-failures
docker-compose -f docker-compose-prod/docker-compose.build.yml build --pull
docker-compose -f docker-compose-prod/docker-compose.build.yml push