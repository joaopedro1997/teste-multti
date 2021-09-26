FROM php:8.0.10-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN apt-get update && \
apt-get install -y libfreetype6-dev libjpeg62-turbo-dev && \
docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install nodejs
RUN curl -sL https://deb.nodesource.com/setup_14.x -o nodesource_setup.sh && bash nodesource_setup.sh && apt-get -y --force-yes install nodejs

# Upgrading Node
RUN npm cache clean -f
RUN npm install -g n
RUN n stable

# Set working directory
WORKDIR /var/www

USER $user
