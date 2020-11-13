#!/bin/bash

git pull

docker-compose -f docker-compose-prod/docker-compose.yml up -d --force-recreate --pull