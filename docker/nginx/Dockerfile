FROM ubuntu:18.04
# install nginx
RUN apt-get update -y
RUN apt-get install -y software-properties-common
RUN add-apt-repository -y ppa:nginx/stable
RUN apt-get update -y
RUN apt-get install -y nginx certbot
# deamon mode off
RUN chown -R www-data:www-data /var/lib/nginx
RUN openssl dhparam -out /etc/nginx/dh2048.pem 2048
RUN mkdir /var/www/letsencrypt
# expose ports
EXPOSE 80 443
# add nginx conf
ADD config/nginx.conf /etc/nginx/nginx.conf
WORKDIR /etc/nginx
CMD ["nginx"]
