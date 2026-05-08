FROM php:8.2-cli

COPY . /app
WORKDIR /app

# Utilise le routeur pour que toutes les requêtes passent par index.php
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-8080} router.php"]