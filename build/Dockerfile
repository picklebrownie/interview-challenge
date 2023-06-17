FROM php:8.1-fpm-alpine

RUN apk add --no-cache --update \
    # mysqli
	&& docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli \
    && echo "=============================================" \
    # xdebug
    && pecl install xdebug-3.1.1 \
    && docker-php-ext-enable xdebug \
    && echo "=============================================" \
    && php -m
    
# Create xdebug log
RUN touch /var/log/xdebug.log
# Allow xdebug to write to log
RUN chmod 777 /var/log/xdebug.log

# Work directory
WORKDIR /var/www