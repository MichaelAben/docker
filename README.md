# Apache, PHP, MYSQL, PHPmyadmin, Mailhog, NPM

## Config
* vhosts go into ./config/vhosts
* certificates go into ./config/certificates
* php.ini can be found in ./config/php

There is a .env file where you can modify the directories and the mysql credentials

## Log files
* apache ./log/apache2
* mysql ./log/mysql

## URL's

_Remember to add project.local to your host file_

**Application without ssl**
http://project.local Will redirect to https as of latest build

**Application with ssl**
https://project.local

**PHPmyadmin**
http://project.local:8080

**Mailhog**
http://project.local:8025

## Xdebug
xdebug is installed and configured for integration with PHPstorm

## Logs
All logs can be found inside directory ./logs

## Application
Application code can be placed inside ./www remember that the default vhost will have the root inside ./www/public

## Database
All database files are inside ./data/mysql

