#!/bin/bash

echo "=============================="
echo "=====  RAS-BAS INSTALL   ====="
echo "=============================="

apt-get update
apt-get upgrade

apt-get install apache2
apt-get install libapache2-mod-php5 php5
apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql

apt-get install mc
apt-get install vim

clear

echo "=============================="
echo "===== INSTALL WEB SERVER ====="
echo "=============================="

apt-get install git-core

git clone git://git.drogon.net/wiringPi

cd wiringPi
./build

clear

echo "=============================="
echo "=====    INSTALL GPIO    ====="
echo "=============================="

gpio -v gpio readall

clear


cp -r ./rasbas /var
chown root /var/rasbas/ -R
chgrp root /var/rasbas/ -R
chmod 755 /var/rasbas/ -R

sudo cp -r ./www /var
mkdir /var/www/phpmyadmin
cp /var/www/phpmyadmin.zip /var/www/phpmyadmin
cd /var/www/phpmyadmin
sudo unzip ./phpmyadmin.zip

/etc/init.d/apache2 restart

echo "=============================="
echo "=====  INSTALL RAS-BAS   ====="
echo "=============================="
