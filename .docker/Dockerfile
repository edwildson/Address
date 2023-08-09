FROM debian:buster-slim

LABEL author="Edwildson C. Rodrigues <edwildson.dev@gmail.com>"
LABEL version=3.0

ARG NODE_VERSION=16

SHELL ["/bin/bash", "-o", "pipefail", "-c"]

RUN apt-get update \
  && apt install --no-install-recommends -y \
    nginx \
    curl \
    zip \
    unzip \
    gnupg2 \
    htop \
    software-properties-common \
    ca-certificates \
    git \
    wget \
    vim \
    xz-utils \
    libcap2-bin \
    libpng-dev \
  && wget https://packages.sury.org/php/apt.gpg \
  && apt-key add apt.gpg \
  && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list \
  && apt-get update \
  && apt-get install -y --no-install-recommends \
    php8.1 \
    php8.1-cli \
    php8.1-gd \
    php8.1-curl \
    php8.1-imap \
    php8.1-mbstring \
    php8.1-xml \
    php8.1-zip \
    php8.1-bcmath \
    php8.1-soap \
    php8.1-intl \
    php8.1-readline \
    php8.1-ldap \
    php8.1-msgpack \
    php8.1-igbinary \
    php8.1-swoole \
    php8.1-memcached \
    php8.1-pcov \
    php8.1-xdebug \
    php8.1-mongodb \
    php8.1-redis \
 && php -r "readfile('https://getcomposer.org/installer');" | php -- \
    --install-dir=/usr/bin/ \
    --filename=composer \
    --version=2.4.2 \
  && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
  && apt-get install -y nodejs \
  && npm install -g -f \
    npm@8.19.2 \
    cross-env@7.0.3 \
    fsevents@2.3.2 \
  && apt-get update \
  && apt-get install -y php8.1-fpm \
  && apt-get -y autoremove \
  && apt-get purge -y wget curl git\
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY conf/default /etc/nginx/sites-available/default
COPY conf/nginx.conf /etc/nginx/nginx.conf