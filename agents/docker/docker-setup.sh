#!/usr/bin/env bash

main() {
    case "${1:-}" in
        build) build;;
        up) up;;
        init) init;;
        *) echo "Usage: $0 {build|up|init}" ;;
    esac
}

build() {
    echo "Building Docker containers..."
    docker-compose build
}

up() {
    echo "Starting Docker containers..."
    docker-compose up -d
}

init() {
    echo "Loading environment variables from .env file..."
    export $(grep -v '^#' .env | xargs)

    echo "Waiting for containers to start..."

    while ! docker-compose exec -T app sh -c "exit" >/dev/null 2>&1; do
        echo "Waiting for PHP container..."
        sleep 5
    done

    echo "PHP container is ready."

    while ! docker-compose exec -T db pg_isready -U ${DB_USERNAME} > /dev/null 2>&1; do
        echo "Waiting for Postgres to start..."
        sleep 2
    done
    echo "Postgres is ready."

    echo "Creating database and schema..."
    docker-compose exec -T db sh -c "
      psql -U ${DB_USERNAME} -d postgres -c 'DROP DATABASE IF EXISTS ${DB_DATABASE}; CREATE DATABASE ${DB_DATABASE};'
    "

    echo "Verifying database creation..."
    docker-compose exec -T db sh -c "
      psql -U ${DB_USERNAME} -d postgres -c '\l' | grep ${DB_DATABASE}
    "

    docker-compose exec -T db sh -c "
      psql -U ${DB_USERNAME} -d ${DB_DATABASE} -c 'DROP SCHEMA IF EXISTS public CASCADE; CREATE SCHEMA public;'
    "

    echo "Running Laravel commands..."
    docker-compose exec -T app sh -c "
          php artisan migrate && \
          php artisan clear-compiled && \
          php artisan cache:clear && \
          php artisan config:clear && \
          php artisan optimize
    "

    echo "Importing database dump..."
    docker-compose exec -T db sh -c "psql -U ${DB_USERNAME} -d ${DB_DATABASE} < /docker-entrypoint-initdb.d/test.dump"

    echo "Importing Announcement data"
    docker-compose exec -T app sh -c "
        php artisan db:seed --class=AnnouncementSeeder
    "
}

main "$@"
