NOTES:
1. reinstalled composer
2. updated php to v.7
3. https://community.c9.io/t/how-to-upgrade-a-php-workspace-to-version-7/8570/5:
sudo add-apt-repository ppa:ondrej/php -y
sudo apt-get update -y
sudo apt-get -f install
sudo apt-get install php7.0-curl php7.0-cli php7.0-dev php7.0-gd php7.0-intl php7.0-mcrypt php7.0-json php7.0-mysql php7.0-opcache php7.0-bcmath php7.0-mbstring php7.0-soap php7.0-xml php7.0-zip -y
sudo mv /etc/apache2/envvars /etc/apache2/envvars.bak
sudo apt-get remove libapache2-mod-php5 -y
sudo apt-get install libapache2-mod-php7.0 -y
sudo cp /etc/apache2/envvars.bak /etc/apache2/envvars

4. php composer.phar install
5. php vendor/bin/phpunit --filter ArrayHelper