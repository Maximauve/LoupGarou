FROM php:8.1.4-alpine

# Update and install git, bash, node and npm
RUN apk --no-cache update && apk --no-cache add bash git nodejs npm

RUN apk add --update openssl-dev

# Install php extensions
RUN docker-php-ext-install pdo_mysql
# RUN	docker-php-ext-install openssl
# RUN	docker-php-ext-install intl

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
	php composer-setup.php && php -r "unlink('composer-setup.php');" && \
	mv composer.phar /usr/local/bin/composer

# Install Symfony-CLI
RUN wget https://get.symfony.com/cli/installer -O - | bash && mv /root/.symfony/bin/symfony /usr/local/bin/symfony

COPY . /usr/src/LoupGarou
WORKDIR /usr/src/LoupGarou

RUN composer install
RUN npm install
RUN chmod +x ./serverLaunch.sh

ENTRYPOINT [ "/bin/sh", "-c", "/usr/src/LoupGarou/serverLaunch.sh" ]