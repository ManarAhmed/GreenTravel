======================== the project on apache2 ==========================

sudo gedit /etc/apache2/apache2.conf

Add these:

 <Directory /var/www/html/greentravel >

DirectoryIndex index.php

AllowOverride All

 </Directory>

sudo a2enmod rewrite #a2enmod: apache2 enable mode rewrite

sudo service apache2 restart # restart the server


======================== the virual host  ======================== 

sudo gedit /etc/apache2/sites-available/greentravel.conf
Add these:
<VirtualHost *:80>
ServerName greentravel.com
DocumentRoot /var/www/html/greentravel/public
SetEnv APPLICATION_ENV "development"
<Directory /var/www/greentravel>
DirectoryIndex index.php
AllowOverride All
</Directory>
</VirtualHost>




************************
Add your virtual host to hosts:
sudo gedit /etc/hosts
And add this line:
127.0.0.1     greentravel.com

- Enable the site on apache server
sudo a2ensite project_name.conf
- Reload the server
sudo service apache2 reload

======================== connection the database ========================

zf configure db-adapter "adapter=PDO_MYSQL&dbname=greentravel&host=localhost&username=iti&password=iti" 
