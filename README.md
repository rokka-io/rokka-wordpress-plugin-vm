# Rokka WordPress Plugin VM

Rokka WordPress Plugin VM

## Requirements

* Vagrant >= 1.8.6 (https://www.vagrantup.com/)
* VirtualBox >= 5.0.26 (https://www.virtualbox.org/)
* Node.js >=0.12.x (https://nodejs.org/)

    ```
    $ npm install -g gulp
    $ gem install sass
    ```

## Installation

1. Clone this repo
1. Run `git submodule init` and `git submodule update`
1. Copy environment specific config file

    ```
    $ cp env_config/dev/wp-dev-config.php web/wp-dev-config.php
    ```

1. Add hosts entry (usually `/etc/hosts`)

    ```
    $ sudo echo '192.168.126.168 rokka-wordpress-plugin-vm.dev' >> /etc/hosts
    ```

1. Install CI dependencies locally

    ```
    $ curl -s https://getcomposer.org/installer | php
    $ php composer.phar install
    $ bin/phpcs --config-set installed_paths vendor/wp-coding-standards/wpcs
    ```

1. Install theme dependencies

    ```
    $ cd web/content/themes/rokka-wordpress-plugin-vm/
    $ npm install
    ```

1. Start Vagrant-Box

    ```
    $ vagrant up
    ```

# Working

## Users

### WordPress MariaDB

To use adminer just create a symbolic link with the following command:

    $ cd web/adminer/
    $ ln -s ../../tools/adminer/adminer-4.2.4-mysql-de.php index.php

* URL: http://rokka-wordpress-plugin-vm.dev/adminer/
* Username: rokkavm
* Password: 123

## Emails

All emails sent in the machine will be catched by MailHog (and not send to the outer world).

To read these emails you can access the MailHog web interface by accessing http://rokka-wordpress-plugin-vm.dev:8025/ in your browser.

## Compile theme resources

    $ cd web/content/themes/rokka-wordpress-plugin-vm/
    $ gulp styles
    $ gulp scripts

or watch changes

    $ cd web/content/themes/rokka-wordpress-plugin-vm/
    $ gulp watch

## Extract messages / Compile translation files

Run the following script to extract messages from PHP-files and generate a new rokka-wordpress-plugin-vm.pot file:

    $ scripts/translations/extract_messages.sh

To compile all .po files to .mo files use the following script:

    $ scripts/translations/compile_translation_files.sh


## Create and restore database dumps

The database dump scripts can only be used inside the vagrant box. So first ssh into the box:

    $ vagrant ssh

Create WordPress database dump:

    $ /vagrant/scripts/db_dumps.sh

The dumps are saved to `data/sql/rokka-wordpress-plugin-vm.sql`.
To restore the databases, you can use the following script:

    $ /vagrant/scripts/restore_dumps.sh
