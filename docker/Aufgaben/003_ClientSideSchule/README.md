# M133-Basisprojekt_17-21

Basis-Docker-Compose Projekt für den Jahrgang 17-21
Es beinhaltet die Docker-Container:

* php
* mysql
* adminier

## Container : php

* Dockerfile im Verzeichnis php
* TCP-Port 8000
* Das Verzeichnis app wird in den Container als Webroot gemountet

## Container : mysql

* Basierend auf Mysql 5.7
* TCP-Port 3306
* Login: user/userpass
* Das Verzeichnis mysql/mysqldata wird als Datenspeicher in den Container gemountet

## Container : adminier

* Alternatives Phpmyadmin
* TCP Port 8080

