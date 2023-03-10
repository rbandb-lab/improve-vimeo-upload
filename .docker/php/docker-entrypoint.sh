#!/bin/sh
set -e

echo "[DEBUG] Docker entrypoint start"
mkdir -p /srv/app/var/cache /srv/app/var/log

# The first time volumes are mounted, the vendors needs to be reinstalled
if [ ! -d vendor ]; then
    echo "[DEBUG] Run composer install"
    composer update discovery/event-library discovery/storage --no-scripts
    composer install --prefer-dist --no-dev --no-progress --no-interaction
fi

echo "[DEBUG] Check for APP_ENV"
if [ "$APP_ENV" = 'dev' ]; then
    echo "[DEBUG] APP_END is equal to 'dev'"
    mkdir -p /composer
    mkdir -p /srv/app/var/cache /srv/app/var/log
    chmod 777 -R /srv/app/var
    composer install --prefer-dist --no-progress --no-interaction
    else
    setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX var
    setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX var
fi

if grep -q ^DATABASE_URL= .env; then
    echo "[DEBUG] There is a database url"
    if [ "$CREATION" = "1" ]; then
        echo "To finish the installation please press Ctrl+C to stop Docker Compose and run: docker-compose up --build"
        sleep infinity
    fi

    echo "Waiting for db to be ready..."
    ATTEMPTS_LEFT_TO_REACH_DATABASE=60
    until [ $ATTEMPTS_LEFT_TO_REACH_DATABASE -eq 0 ] || DATABASE_ERROR=$(bin/console dbal:run-sql "SELECT 1" 2>&1); do
        if [ $? -eq 255 ]; then
            # If the Doctrine command exits with 255, an unrecoverable error occurred
            ATTEMPTS_LEFT_TO_REACH_DATABASE=0
            break
        fi
        sleep 1
        ATTEMPTS_LEFT_TO_REACH_DATABASE=$((ATTEMPTS_LEFT_TO_REACH_DATABASE - 1))
        echo "Still waiting for db to be ready... Or maybe the db is not reachable. $ATTEMPTS_LEFT_TO_REACH_DATABASE attempts left"
    done

    if [ $ATTEMPTS_LEFT_TO_REACH_DATABASE -eq 0 ]; then
        echo "The database is not up or not reachable:"
        echo "$DATABASE_ERROR"
        exit 1
    else
        echo "The db is now ready and reachable"
    fi

    echo "[DEBUG] We are checking for database migrations"
    if ls -A migrations/*.php >/dev/null 2>&1; then
        echo "[DEBUG] Run the database migrations"
        bin/console doctrine:migrations:migrate --no-interaction
    fi
fi

exec docker-php-entrypoint "$@"
