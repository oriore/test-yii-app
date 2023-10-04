#!/bin/bash
set -e

# apt最新化/モジュールのインストール
apt-get update
apt-get install -y nodejs npm

# install composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# composer install の実行
cd /var/www/service
composer install

# create npm directory
if [ -d "/var/www/service/project/npm" ]; then
  echo "npm directory exists"
else
  mkdir -p /var/www/service/project/npm
fi

# node modules install
cd /var/www/service/project/npm
npm install bootstrap@5.3.0
npm install @fortawesome/fontawesome-free

# create assets directory
if [ -d "/var/www/service/project/assets" ]; then
  echo "assets directory exists"
else
  mkdir -p /var/www/service/project/assets
fi

# bootstrap link
if [ ! -d "/var/www/service/project/assets/bootstrap5.3" ]; then
  ln -s /var/www/service/project/npm/node_modules/bootstrap/dist/ /var/www/service/project/assets/bootstrap5.3
fi

# fontawesome link
if [ ! -d "/var/www/service/project/assets/fontawesome-free" ]; then
  ln -s /var/www/service/project/npm/node_modules/@fortawesome/fontawesome-free/ /var/www/service/project/assets/fontawesome-free
fi

# apache起動
apache2-foreground

exec "$@"