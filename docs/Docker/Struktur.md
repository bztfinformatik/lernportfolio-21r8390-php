# Projekt Struktur

Dieses Dokument beschreibt die Struktur der [Projektvorlage](../PHP/Beispiele/DockerPHP.zip).

## Compose-File

Das Compose-File ist in der Datei `docker-compose.yml` zu finden. Es enthält die Definition der Container und deren **Abhängigkeiten**.

-   …ein Container ist eine in sich geschlossene Einheit, die idealerweise nur “einen” Aufrag hat
-   …wir müssen mehrere solche Container untereinder über IP kommunizieren lassen (virtuelle Netze, SDN,
    uswusf.)
-   …wir wollen lokalen Storage (lokales Filesystem) in den Container mounten können

Die **Verwaltung** ist sehr schwierig, deshalb befinden sich alle Konfigurationen in einer Datei.

### File

In unserem Beispiel sieht die Datei wie folgt aus:

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

## Adminer
