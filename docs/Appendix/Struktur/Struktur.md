---
tags:
    - "Nicht zugeteilt"
---

# Projekt Struktur

Dieses Dokument beschreibt die Struktur der [Projektvorlage](DockerPHP.zip).

## Compose-File

Das Compose-File ist in der Datei `docker-compose.yml` zu finden. Es enthält die Definition der Container und deren **Abhängigkeiten**.

-   …ein Container ist eine in sich geschlossene Einheit, die idealerweise nur “einen” Aufrag hat
-   …wir müssen mehrere solche Container untereinder über IP kommunizieren lassen (virtuelle Netze, SDN,
    uswusf.)
-   …wir wollen lokalen Storage (lokales Filesystem) in den Container mounten können

Die **Verwaltung** ist sehr schwierig, deshalb befinden sich alle Konfigurationen in einer Datei.

### File

In unserem Beispiel sieht die Datei wie folgt aus:

??? example "Docker Compose"

    ```yaml title="docker-compose.yml"
    version: "3"

    volumes:
        mysqldata:
        mysqlinit:
        app:

    services:
        php:
            build: ./php
            ports:
                - 8000:80
            volumes:
                - ./app:/var/www/html

        mysql:
            image: mysql:8
            ports:
                - 3306:3306
            command: --default-authentication-plugin=mysql_native_password
            environment:
                MYSQL_ROOT_PASSWORD: root
                MYSQL_USER: user
                MYSQL_PASSWORD: userpass
                MYSQL_DATABASE: testdb
            volumes:
                - ./mysql/initscripts:/docker-entrypoint-initdb.d
                - ./mysql/mysqldata:/var/lib/mysql/

        adminer:
            image: adminer
            ports:
                - 8085:8080
    ```

## Datenbank

Als Datenbank wird [MySQL](https://www.mysql.com/) verwendet, da das Setup über Docker sehr einfach ist und PHP eine hervorragende **Kompatibilität** bietet. Die Datenbank wird in einem eigenen Container gestartet und kann über den Port `3306` angesprochen werden. Unter `mysqldata` wird der **Datenbank-Ordner** abgelegt, der beim Neustart des Containers erhalten bleibt. Das sind die Binärdateien für den MySQL-Server. Unter `initscripts` werden die **SQL-Dateien** abgelegt, die beim Start des Containers ausgeführt werden. Das sind die SQL-Dateien, die die Datenbankstruktur und die Testdaten beinhalten. Die SQL-Dateien werden in der **Reihenfolge** ausgeführt, in der sie im Ordner liegen, also Alphabetisch.

### Adminer

[Adminer](https://www.adminer.org/) ist eine alternative zu [phpMyAdmin](https://www.phpmyadmin.net/). Es ist eine **Webanwendung**, die die Datenbankverwaltung über den Browser ermöglicht. Adminer wird in einem eigenen Container gestartet und kann über den Port `8085` angesprochen werden. Der Vorteil von Adminer ist, dass es sehr klein ist und keine zusätzlichen Abhängigkeiten hat. Der Nachteil ist, dass es nicht so viele Funktionen wie phpMyAdmin hat. Einen Vergleich zwischen den beiden Plattformen ist [hier](https://www.adminer.org/en/phpmyadmin/) zu finden.

## PHP

Das Projekt ist natürlich mit PHP versehen. PHP wird in einem eigenen Container gestartet und kann über den Port `8000` angesprochen werden. Unter `app` wird der **Web-Ordner** abgelegt. Das sind die PHP-Dateien, die die Webanwendung beinhalten. In diesen Ordner werden alle PHP-Dateien gelegt, die über den Browser aufgerufen werden können. Beim Aufrufen der Webseite wird nur dieser **Bereich** des Containers verwendet. Der Rest des Containers ist nicht zugreifbar. Unter `css` werden die **CSS-Dateien** abgelegt. Das sind die Dateien, die die Formatierung der Webseite beinhalten. Die **JavaScript-Dateien** werden unter `js` abgelegt. Diese Dateien beinhalten die Logik der Webseite. Controller, welche nur Daten auswerten und ausgeben, sollten unter `api` gespeichert werden.
