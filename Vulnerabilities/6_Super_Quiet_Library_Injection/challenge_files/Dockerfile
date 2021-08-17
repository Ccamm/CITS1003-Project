FROM debian:buster-slim

# Install system packeges
RUN apt-get update && apt-get install -y supervisor nginx lsb-release curl wget

# Add repos
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list

# Install PHP dependencies and sqlite3
RUN apt update && apt install -y php7.4-fpm php7.4-sqlite3 sqlite3 libsqlite3-dev


# Configure php-fpm and nginx
COPY config/fpm.conf /etc/php/7.4/fpm/php-fpm.conf
COPY config/supervisord.conf /etc/supervisord.conf
COPY config/nginx.conf /etc/nginx/nginx.conf

# Copy challenge files
COPY src /var/www/html

# Copy SQL script and create DB
COPY create_db.sql /run/create_db.sql

# Create SQLite DB
RUN mkdir -p /run/database
RUN sqlite3 /run/database/website.db < /run/create_db.sql

# Setup permissions
RUN chown -R www-data:www-data /var/www/html /var/lib/nginx /run/database /run/database/website.db /var/lib/php/sessions
RUN chmod 666 /run/database/website.db

# Expose the port nginx is listening on
EXPOSE 1000

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
