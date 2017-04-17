#!/bin/bash

set -e

DIR=`dirname $0`

cd $DIR/../web/content/themes/rokka-wordpress-plugin-vm
gulp styles
gulp scripts
