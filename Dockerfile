FROM php:8.2-apache

# Désactiver les MPM en conflit, garder seulement prefork
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true \
    && a2enmod mpm_prefork

# Copier les fichiers du projet
COPY . /var/www/html/
RUN chmod -R 755 /var/www/html/

# Adapter le port pour Railway
RUN sed -i 's/80/${PORT}/g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's/Listen 80/Listen ${PORT}/g' /etc/apache2/ports.conf

ENV PORT=80

EXPOSE ${PORT}

CMD ["apache2-foreground"]