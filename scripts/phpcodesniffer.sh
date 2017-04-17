#!/bin/sh

DIR=`dirname $0`

files_to_check=$1
if [ -z "$1" ]; then
    files_to_check="${DIR}/../web/content/themes/rokka-wordpress-plugin-vm"
fi

$DIR/../bin/phpcs -p --ignore=css,js,*/vendor/*,*/tests/*,*/assets/external/* --report-width=100 --standard=$DIR/../code_standard.xml "$files_to_check"
exit $?
