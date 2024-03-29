#!/bin/bash

cp -r ./rasbas /var
chown root /var/rasbas/ -R
chgrp root /var/rasbas/ -R
chmod 500 /var/rasbas/ -R

sudo cp -r ./www /var
mkdir /var/www/phpmyadmin
cp /var/www/phpmyadmin.zip /var/www/phpmyadmin
cd /var/www/phpmyadmin
sudo unzip .//phpmyadmin.zip
sudo rm /var/www/index.html

/etc/init.d/apache2 restart

echo "=============================="
echo "=====  INSTALL RAS-BAS   ====="
echo "=============================="
