FROM debian:buster-slim

# Install system packeges
RUN apt-get update && apt-get install -y supervisor nginx lsb-release curl wget

# Add repos
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

# Install PHP dependencies and ping
RUN apt update && apt install -y php7.4-fpm iputils-ping


# Configure php-fpm and nginx
COPY config/fpm.conf /etc/php/7.4/fpm/php-fpm.conf
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/nginx.conf /etc/nginx/nginx.conf

# Copy challenge files
COPY src /var/www/html

# Copy flag
COPY flag /flag

# Setup permissions
RUN chown -R www-data:www-data /var/www/html /var/lib/nginx

# Expose the port nginx is listening on
EXPOSE 1337

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
