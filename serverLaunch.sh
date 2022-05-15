symfony console doctrine:schema:update --force
symfony console doctrine:fixtures:load --no-interaction
npm run watch &
symfony serve --port=8000