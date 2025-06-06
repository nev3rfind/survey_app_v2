#!/bin/bash

echo "🚀 Setting up Laravel application with Docker..."

# Create necessary directories
mkdir -p docker/mysql/data
mkdir -p docker/nginx/ssl
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Set permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache

echo "📦 Building and starting Docker containers..."
docker-compose up -d --build

echo "⏳ Waiting for services to start..."
sleep 30

echo "🔧 Installing Composer dependencies..."
docker-compose exec php composer install --no-dev --optimize-autoloader

echo "🔑 Generating application key..."
docker-compose exec php php artisan key:generate

echo "🗄️ Running database migrations..."
docker-compose exec php php artisan migrate --force

echo "🔗 Creating storage link..."
docker-compose exec php php artisan storage:link

echo "🧹 Clearing and caching config..."
docker-compose exec php php artisan config:clear
docker-compose exec php php artisan config:cache
docker-compose exec php php artisan route:cache
docker-compose exec php php artisan view:cache

echo "📦 Installing Node.js dependencies and building assets..."
docker-compose exec node npm install
docker-compose exec node npm run production

echo "✅ Setup complete!"
echo ""
echo "🌐 Your application is now running at: http://localhost"
echo "📧 MailHog (email testing) is available at: http://localhost:8025"
echo "🗄️ MySQL is accessible on port 3306"
echo "🔴 Redis is accessible on port 6379"
echo ""
echo "📋 Useful commands:"
echo "  - View logs: docker-compose logs -f"
echo "  - Access PHP container: docker-compose exec php bash"
echo "  - Run artisan commands: docker-compose exec php php artisan [command]"
echo "  - Stop containers: docker-compose down"
echo "  - Restart containers: docker-compose restart"