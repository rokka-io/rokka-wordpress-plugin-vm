#!/bin/bash

set -e

if [ ! -d /vagrant ] ; then
    echo "This script must be run *inside* the vagrant box"
    exit 1
fi

# MariaDB (WordPress DB)
echo "Create dump of MariaDB..."
mysqldump -u rokkavm -p123 --skip-extended-insert --skip-quick rokkavm > /vagrant/data/sql/rokka-wordpress-plugin-vm.sql
