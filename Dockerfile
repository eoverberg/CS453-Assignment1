# Use the official PHP image as the base image
FROM php:8.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the PHP files from the current directory to the working directory in the container
COPY . /var/www/html

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Update Apache configuration to use .htaccess files
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache server when the container launches
CMD ["apache2-foreground"]
