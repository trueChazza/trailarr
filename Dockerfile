ARG PHP_EXTENSIONS="apcu bcmath pdo_sqlite imagick gd"
FROM thecodingmachine/php:8.0-v4-slim-apache as php_base
ENV TEMPLATE_PHP_INI=production \
    APACHE_DOCUMENT_ROOT=/var/www/html/public

COPY --chown=docker:docker . /var/www/html

USER root

RUN apt-get -y update && \
    apt-get install python sqlite3 supervisor -y && \
    curl -L https://yt-dl.org/downloads/latest/youtube-dl -o /usr/local/bin/youtube-dl && \
    chmod a+rx /usr/local/bin/youtube-dl

COPY build/apache/ports.conf /etc/apache2/ports.conf
COPY build/apache/000-default.conf /etc/apache2/sites-enabled/000-default.conf

COPY build/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY build/apache.conf /etc/supervisor/conf.d/apache.conf
COPY build/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

RUN mkdir /trailers

USER docker

RUN composer install --quiet --optimize-autoloader --no-dev && \
    touch database/database.sqlite || exit && \
    cp .env.example .env && \
    php artisan key:generate && \
    php artisan migrate --force

FROM node:14.15.4 as node_dependencies
WORKDIR /var/www/html
COPY --from=php_base /var/www/html /var/www/html
RUN npm set progress=false && \
    npm config set depth 0 && \
    npm install && \
    npm run prod && \
    rm -rf node_modules

FROM php_base
COPY --from=node_dependencies --chown=docker:docker /var/www/html /var/www/html

USER root

EXPOSE 8080

CMD ["/usr/bin/supervisord", "-c" , "/etc/supervisor/conf.d/supervisord.conf"]
