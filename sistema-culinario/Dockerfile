FROM php:8.2-fpm

# Instalando dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Instalando extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalando Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definindo diretório de trabalho
WORKDIR /var/www

# Copiando arquivos do projeto
COPY . /var/www

# Instalando dependências do projeto
RUN composer install && \ 
    npm install && \
    npm run build

# Configurando permissões
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www/storage