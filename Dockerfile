FROM ubuntu:20.04

ENV TZ=UTC

RUN export LC_ALL=C.UTF-8
RUN DEBIAN_FRONTEND=noninteractive
RUN rm /bin/sh && ln -s /bin/bash /bin/sh
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update
RUN apt-get install -y \
  sudo \
  autoconf \
  autogen \
  language-pack-en-base \
  wget \
  zip \
  unzip \
  curl \
  rsync \
  ssh \
  openssh-client \
  git \
  build-essential \
  apt-utils \
  software-properties-common \
  nasm \
  libjpeg-dev \
  libpng-dev \
  libpng16-16

RUN useradd -m docker && echo "docker:docker" | chpasswd && adduser docker sudo

# PHP
RUN LC_ALL=en_US.UTF-8 add-apt-repository ppa:ondrej/php && apt-get update && apt-get install -y php8.0
RUN apt-get install -y \
  php8.0-curl \
  php8.0-gd \
  php8.0-dev \
  php8.0-xml \
  php8.0-bcmath \
  php8.0-mysql \
  php8.0-pgsql \
  php8.0-mbstring \
  php8.0-zip \
  php8.0-bz2 \
  php8.0-sqlite \
  php8.0-soap \
  php8.0-intl \
  php8.0-imap \
  php8.0-imagick \
  php-memcached
RUN command -v php

# Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer && \
  chmod +x /usr/local/bin/composer && \
  composer self-update
RUN command -v composer

# Node.js
RUN curl -sL https://deb.nodesource.com/setup_14.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN apt-get install nodejs -y
RUN command -v node
RUN command -v npm

COPY . /app
WORKDIR /app
EXPOSE 8080
RUN composer install
RUN npm install
RUN npm run build
CMD ["php", "artisan", "octane:start", "-n", "--host=0.0.0.0", "--port=8080"]