FROM centos:7.9.2009
LABEL maintainer="Mohammad Roshandelpoor"

ARG WWWGROUP
ARG WWWUSER
WORKDIR /var/www/html

RUN yum -y update
RUN yum install -y epel-release \
    && rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm

RUN yum install -y unzip curl nano wget yum-utils mod_ssl

# PHP Install
RUN yum --enablerepo=remi-php81 install -y php
RUN yum --enablerepo=remi-php81 install -y php-xml php-soap php-pdo php-mysql php-xmlrpc php-mbstring php-json php-gd php-mcrypt php-oci php-fpm php-zip php-pear php-devel php-bcmath php-intl php-opcache

# php extention bcmath
RUN yum install -y php81-php-bcmath.x86_64
RUN cp /etc/opt/remi/php81/php.d/20-bcmath.ini /etc/php.d/
RUN cp /opt/remi/php81/root/usr/lib64/php/modules/bcmath.so /usr/lib64/php/modules/

# composer
RUN curl -sS https://getcomposer.org/installer | php --  --install-dir=/usr/bin --filename=composer

ENTRYPOINT composer install; echo "nameserver 185.51.200.2" >> /etc/resolv.conf; echo "nameserver 178.22.122.100" >> /etc/resolv.conf; php -S localhost:8000;

CMD ["tail -f /dev/null", "-D", "FOREGROUND"]

EXPOSE 8000
