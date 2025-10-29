# Simple Apache + PHP image
FROM php:8.2-apache

# Enable common Apache modules
RUN a2enmod rewrite headers

# Copy your site
COPY . /var/www/html/

# Secure permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Expose port (Render will map this)
EXPOSE 80
