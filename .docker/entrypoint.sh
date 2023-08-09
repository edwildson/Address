#!/bin/bash

chown -R www-data: storage

service php8.1-fpm start && nginx