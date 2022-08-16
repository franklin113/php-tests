# https://hub.docker.com/r/trafex/php-nginx
docker run --rm  -p 80:8080 --name nginx-php-web -v $PWD:/var/www/html trafex/php-nginx