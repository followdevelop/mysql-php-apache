# MySQL

apache
docker pull httpd:2.4.33-alpine
docker run -d --rm --name my-apache-app httpd:2.4.33-alpine
mkdir apache
docker cp my-apache-app:/usr/local/apache2/conf/httpd.conf .
docker stop my-apache-app

jsar@jsar-PC MINGW64 ~/docker/containers
    $ ls
    ManualJeisson.txt  ManualJohan.txt  README.txt  apache/  httpd.conf  mysql/  php.txt  web/
jsar@jsar-PC MINGW64 ~/docker/containers
    $ mv httpd.conf apache/

    apache httpd . quitar comnetario 140 y 144
    246 non ALL
    247 denied granted
    283 non ALL
    296 antes index html index php --> DirectoryIndex index.php index.html
    549 
    <IfModule proxy_module>
ProxyPassMatch ^/(.*\.php(/.*)?)$ fcgi://mi-aplicacion-php:9000/usr/local/apache2/htdocs/$1
</IfModule>

----------------------
docker run \
      --link mi-aplicacion-php \
      --name mi-aplicacion-apache \
      -v $(pwd)/apache/httpd.conf:/usr/local/apache2/conf/httpd.conf \
      -v $(pwd)/web:/usr/local/apache2/htdocs \
      -p 8080:80 \
      -d \
      httpd:2.4.33-alpine