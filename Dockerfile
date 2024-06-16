FROM php:8.1.7-apache-buster

RUN apt-get update && apt-get upgrade -y

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 80
