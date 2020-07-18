FROM nginx:alpine

# Install base packages
RUN apk --no-cache --update add supervisor \
    nano \
    bash

RUN addgroup -g 1000 -S www-data; exit 0
RUN adduser -u 1000 -D -S -G www-data www-data; exit 0

# Clean up
RUN rm -R /var/cache/apk

COPY ./docker/web/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/web/supervisord.conf /etc/supervisord.conf

# Copy certificate files
COPY ./docker/web/bin/mkcert /usr/local/bin/mkcert
COPY ./docker/web/cert/rootCA.pem /usr/local/share/certs/rootCA.pem
COPY ./docker/web/cert/rootCA-key.pem /usr/local/share/certs/rootCA-key.pem

# Create ssl certificate and install
RUN mkdir -p /root/.local/share/mkcert/ \
 && mv /usr/local/share/certs/rootCA.pem /root/.local/share/mkcert/rootCA.pem \
 && mv /usr/local/share/certs/rootCA-key.pem /root/.local/share/mkcert/rootCA-key.pem \
 && chmod +x /usr/local/bin/mkcert \
 && mkdir -p /usr/local/share/certs/ \
 && mkcert -cert-file /usr/local/share/certs/localhost.pem -key-file /usr/local/share/certs/localhost-key.pem webshop.test

# Copy files to working directory
RUN mkdir -p /var/www/html && chown -R www-data:www-data /var/www/html

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisord.conf"]
