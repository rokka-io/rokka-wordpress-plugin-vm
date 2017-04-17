#!/bin/bash

set -e

if [ ! -d /vagrant ] ; then
    echo "This script must be run *inside* the vagrant box"
    exit 1
fi

sudo apachectl stop

# MariaDB (WordPress DB)
echo "Restore MariaDB database..."
mysql -u rokkavm -p123 -e"show databases;" | grep rokkavm && mysql -u rokkavm -p123 -e"DROP DATABASE rokkavm;"
mysql -u rokkavm -p123 -e"CREATE DATABASE rokkavm;"
mysql -u rokkavm -p123 rokkavm < /vagrant/data/sql/rokka-wordpress-plugin-vm.sql

# Flush Redis cache
sudo redis-cli flushall

# Restart Apache
sudo apachectl start
