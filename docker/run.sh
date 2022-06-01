#!/bin/sh

cd /var/www

for i in `seq 1 10`;
    do
        nc -z db 3306 && echo "tentando conectar no mysql"
        echo -n .
        sleep 1
    done

php artisan migrate:fresh --seed
php artisan cache:clear
php artisan route:cache
CMD php artisan serve --host=0.0.0.0 --port $PORT
/usr/bin/supervisord -c /etc/supervisord.conf
