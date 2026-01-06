#!/bin/bash
# Wait for Docker to be ready
echo "Waiting for Docker to be ready..."
sleep 5

# Start containers
echo "Starting containers..."
docker compose up -d

# Wait for containers to be healthy
echo "Waiting for containers to start..."
sleep 10

# Enter container and setup
echo "Setting up Laravel..."
docker compose exec app sh -c "
cd laravel && \
php artisan config:clear && \
php artisan cache:clear && \
php artisan view:clear && \
echo 'Setup complete!'
"

echo "Done! Visit http://localhost:2020"
