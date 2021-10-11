FROM php:8.0-apache
WORKDIR /var/www/html
COPY . /var/www/html/BryanPalma
EXPOSE 80

RUN cd /var/www/html/BryanPalma
RUN chmod 777 /var/www/html/BryanPalma