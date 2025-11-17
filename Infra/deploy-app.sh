#!/bin/bash

# Script to deploy Laravel application to the server
# Usage: ./deploy-app.sh <APP_SERVER_IP> <KEY_FILE>

set -e

if [ "$#" -ne 2 ]; then
    echo "Usage: $0 <APP_SERVER_IP> <KEY_FILE>"
    exit 1
fi

APP_SERVER_IP=$1
KEY_FILE=$2

echo "=========================================="
echo "Deploying FarmTech MIS Application"
echo "=========================================="

# Colors
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

echo -e "${YELLOW}Connecting to $APP_SERVER_IP...${NC}"

# Copy application files
echo -e "${YELLOW}Copying application files...${NC}"
scp -r -i "$KEY_FILE" ../farm-manager/* ec2-user@"$APP_SERVER_IP":/tmp/farmtech-mis/

# Run deployment commands on server
echo -e "${YELLOW}Setting up application on server...${NC}"
ssh -i "$KEY_FILE" ec2-user@"$APP_SERVER_IP" << 'ENDSSH'
    sudo mkdir -p /var/www/farmtech-mis
    sudo cp -r /tmp/farmtech-mis/* /var/www/farmtech-mis/
    cd /var/www/farmtech-mis
    
    # Set permissions
    sudo chown -R nginx:nginx /var/www/farmtech-mis
    sudo chmod -R 755 /var/www/farmtech-mis
    sudo chmod -R 775 /var/www/farmtech-mis/storage
    sudo chmod -R 775 /var/www/farmtech-mis/bootstrap/cache
    
    # Install dependencies
    sudo -u nginx /usr/local/bin/composer install --no-dev --optimize-autoloader
    
    # Generate application key if .env doesn't exist
    if [ ! -f .env ]; then
        sudo -u nginx cp .env.example .env
        sudo -u nginx php artisan key:generate
    fi
    
    # Run migrations
    sudo -u nginx php artisan migrate --force
    
    # Seed database
    sudo -u nginx php artisan db:seed --force
    
    # Optimize
    sudo -u nginx php artisan optimize
    
    # Restart services
    sudo systemctl restart php-fpm nginx
    
    echo "Application deployed successfully!"
ENDSSH

echo -e "${GREEN}Deployment completed!${NC}"
echo "Visit http://$APP_SERVER_IP to see your application"

