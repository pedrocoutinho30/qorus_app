# Dockerfile
# Use a imagem oficial do PHP com Apache e suporte a extensões necessárias
FROM php:8.1-apache

# Atualize pacotes e instale dependências
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libmagickwand-dev libwebp-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd 
  

# Definir a raiz do Apache para a pasta public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Configuração da pasta de trabalho
WORKDIR /var/www/html

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar arquivos do Laravel para o contêiner
COPY . /var/www/html

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Executar comandos do Artisan
RUN php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan storage:link \
    && php artisan config:cache
    
# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

    # Habilitar mod_rewrite no Apache
RUN a2enmod rewrite
# Expor a porta 80 para acesso ao Laravel
EXPOSE 80


# Comando para iniciar o Apache
CMD ["apache2-foreground"]