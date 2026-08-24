#!/bin/sh

# Run migrations automatically without asking for confirmation
php yii migrate --interactive=0

# Start the Apache server in the foreground (keeps the container running)
apache2-foreground
