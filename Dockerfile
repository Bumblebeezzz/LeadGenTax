FROM php:8.1-cli

WORKDIR /var/www/html

# Copy all files
COPY . .

# Expose port (Render will set PORT env var)
EXPOSE 8080

# Start PHP built-in server using PORT from environment
CMD php -S 0.0.0.0:${PORT:-8080} router.php

