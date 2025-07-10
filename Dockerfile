# Dockerfile para Lumen (PHP 7.2)
FROM php:7.2-cli

# Instala extensões necessárias
RUN apt-get update \
    && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git unzip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd pdo pdo_mysql

# Instala o Composer
COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto
COPY . /var/www

# Instala dependências do projeto
RUN composer install --no-dev

# Expõe a porta padrão do PHP
EXPOSE 8000

# Comando padrão para iniciar o servidor embutido
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"] 