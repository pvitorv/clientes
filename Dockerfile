FROM php:8.2-fpm

# Instala as dependências do sistema e o driver pgsql para PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia os arquivos do projeto
COPY . /var/www

WORKDIR /var/www

# Instala as dependências do Composer
RUN composer install

# Define o usuário não-root
RUN usermod -u 1000 www-data

CMD ["php-fpm"]
