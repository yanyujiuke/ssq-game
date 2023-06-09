FROM bitnami/php-fpm:8.1-prod

# 设置时间
RUN /bin/cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo 'Asia/Shanghai' > /etc/timezone
# 扩展依赖
RUN apt-get update \
    && apt-get install -y \
        vim \
        curl \
        wget \
        git \
        zip \
        libz-dev \
        libssl-dev \
        libnghttp2-dev \
        libpcre3-dev \
        libmemcached-dev \
        zlib1g-dev \
    && apt-get clean \
    && apt-get autoremove
# Composer安装
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update --clean-backups

# Mysqli 扩展 自带 直接安装即可(当前数据库使用的mysqli查询的)
RUN docker-php-ext-install mysqli
# PDO 扩展 自带 直接安装即可
RUN docker-php-ext-install pdo_mysql
# Bcmath 扩展 自带 直接安装即可
RUN docker-php-ext-install bcmath
# Redis 扩展下载 pecl本地安装 开启扩展
RUN wget http://pecl.php.net/get/redis-${PHPREDIS_VERSION}.tgz -O /tmp/redis.tgz \
    && pecl install /tmp/redis.tgz \
    && rm -rf /tmp/redis.tgz \
    && docker-php-ext-enable redis

# mongodb 扩展下载 pecl本地安装 开启扩展 前面已经通过
RUN wget http://pecl.php.net/get/mongodb-${MONGODB_VERSION}.tgz -O /tmp/mongodb.tgz \
    && pecl install /tmp/mongodb.tgz \
    && rm -rf /tmp/mongodb.tgz \
    && docker-php-ext-enable mongodb
# 开启php-fpm
RUN php-fpm

WORKDIR /usr/share/nginx/html
