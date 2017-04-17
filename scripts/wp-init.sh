#!/bin/bash

set -e
HERE=`dirname $0`
ROOT="$HERE/.."

if [ ! -d /vagrant ] ; then
    echo "This script must be run *inside* the vagrant box"
    exit 1
fi

echo "Switching theme..."
$ROOT/wp-cli.phar theme activate rokka-wordpress-plugin-vm --path="$ROOT/web/cms"

echo "Enabling WordPress plugins..."
$ROOT/wp-cli.phar plugin activate rokka-wordpress-plugin --path="$ROOT/web/cms"
