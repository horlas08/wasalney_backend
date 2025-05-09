#!/bin/bash
    cd /www/wwwroot/waslny.click
    git pull
    php artisan optimize:clear
    