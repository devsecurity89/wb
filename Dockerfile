FROM php:8.2-apache

COPY . /var/www/html/

RUN chmod -R 755 /var/www/html/

# Permet à Apache d'utiliser le port dynamique de Railway
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's/Listen 80/Listen ${PORT}/g' /etc/apache2/ports.conf

ENV PORT=80

EXPOSE ${PORT}

CMD ["apache2-foreground"]