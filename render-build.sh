#!/bin/bash
composer install --no-dev --optimize-autoloader
php -S 0.0.0.0:10000 -t public
