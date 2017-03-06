cd ~
# Mise a jour
echo "******************************************************************************************************************"
echo "Mise a jour"
echo "******************************************************************************************************************"
sudo apt update

#Temps d'arrêt
sleep 3

# installation de PHP
echo "******************************************************************************************************************"
echo "Installation de PHP"
echo "******************************************************************************************************************"
#Temps d'arrêt
sleep 3
sudo apt install -y php
php -v

#Temps d'arrêt
sleep 1

# installation de apache
echo "******************************************************************************************************************"
echo "Installation de apache"
echo "******************************************************************************************************************"
#Temps d'arrêt
sleep 3
sudo apt install -y apache2 libapache2-mod-php

#Temps d'arrêt
sleep 1

# installation de MySQL
echo "******************************************************************************************************************"
echo "Installation de MySQL"
echo "******************************************************************************************************************"

#Temps d'arrêt
sleep 3
sudo apt install -y mysql-server php-mysql

#Temps d'arrêt
sleep 1

# redemarrage des serveurs apache et mysql
echo "******************************************************************************************************************"
echo "Redemarrage des serveurs apache et mysql"
echo "******************************************************************************************************************"

#Temps d'arrêt
sleep 3

sudo systemctl restart apache2.service
sudo systemctl restart mysql.service

#Temps d'arrêt
sleep 1

# Installation Phpmyadmin
echo "******************************************************************************************************************"
echo "Installation Phpmyadmin"
echo "******************************************************************************************************************"
#Temps d'arrêt
sleep 3
sudo apt-get install -y phpmyadmin
# Ecriture  de la ligne Include pour phpmyadmin dans le fichier /etc/apache2/apache2.conf
cd /etc/apache2/
sudo chmod -R 777 apache2.conf
echo "Include /etc/phpmyadmin/apache.conf" >> apache2.conf
cd ~
#Temps d'arrêt
sleep 1

#Redémarrage de Apache
sudo /etc/init.d/apache2 restart

#Mise en place Symfony
echo "******************************************************************************************************************"
echo "Installation de Symfony"
echo "******************************************************************************************************************"
#Temps d'arrêt
sleep 3

sudo mkdir -p /usr/local/bin
sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
sudo chmod a+x /usr/local/bin/symfony
cd /var/www/
sudo chmod -R 777 html

#Temps d'arrêt
sleep 1



# Installation de git
echo "******************************************************************************************************************"
echo "Installation de Git"
echo "******************************************************************************************************************"
#Temps d'arrêt
sleep 3

sudo apt-get install -y

#Temps d'arrêt
sleep 1

# Installation de Ruby
echo "******************************************************************************************************************"
echo "Installation de Ruby"
echo "******************************************************************************************************************"
#Temps d'arrêt
sleep 3
sudo apt-get install -y ruby-full

#Temps d'arrêt
sleep 1

# Installation de Gist
echo "******************************************************************************************************************"
echo "Installation de Gist"
echo "******************************************************************************************************************"
#Temps d'arrêt
sleep 3
sudo gem install gist

#Temps d'arrêt
sleep 1

#Installation Chrome
echo "******************************************************************************************************************"
echo "Installation de Chrome"
echo "******************************************************************************************************************"
#Temps d'arrêt
sleep 3

sudo sh -c 'echo "deb https://dl.google.com/linux/chrome/deb/ stable main" > /etc/apt/sources.list.d/google-chrome.list' &&  sudo apt-get update &&  sudo apt-get install google-chrome-stable

#Temps d'arrêt
sleep 1 

#Installation VLC
echo "******************************************************************************************************************"
echo "Installation de VLC"
echo "******************************************************************************************************************"

#Temps d'arrêt
sleep 3

sudo add-apt-repository ppa:videolan/stable-dailyapt-get && sudo apt-get update && sudo apt-get install vlc




