# Use an official PHP runtime as a parent image
FROM php:latest

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install PHP extensions and other dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose port 80 to the outside world
EXPOSE 80

# Command to run the PHP server
CMD ["php", "-S", "0.0.0.0:80"]
