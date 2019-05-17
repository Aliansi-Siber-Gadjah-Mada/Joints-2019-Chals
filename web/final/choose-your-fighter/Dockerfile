from php:7.2-fpm

# RUN apt install php

RUN docker-php-ext-install mysqli pdo_mysql

WORKDIR /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]