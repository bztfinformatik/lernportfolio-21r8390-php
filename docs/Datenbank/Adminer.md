---
tags:
    - LB1
    - Datenbank
---

# Adminer

[Adminer](https://www.adminer.org/) ist eine Datenbankverwaltung, die in PHP geschrieben ist. Sie ist eine Alternative zu **phpMyAdmin**, da es sehr einfach zu bedienen ist und mit mehreren Datenbanken kompatibel ist. Es wird jedoch gleich als **Webanwendung** verwendet. Adminer ist eine Single-File-Anwendung, die keine Datenbank benötigt. Sie kann auf einem beliebigen Webserver installiert werden und ist daher sehr flexibel einsetzbar. Adminer ist Open Source und steht unter der [Apache 2.0 Lizenz](https://www.apache.org/licenses/LICENSE-2.0). Der **Vorteil** von Adminer ist, dass es ohne Probleme erweitert werden kann. So können eigene **Themes** oder [Plugins](https://www.adminer.org/en/plugins/) hinzugefügt werden.

## Installation

Gleich wie die Datenbank kann Adminer über einen [Container](Start.md#container) installiert werden. Dazu wird folgender Code in der `docker-compose.yml` Datei eingefügt:

```yaml title="Adminer Container"
adminer:
    image: adminer
    restart: unless-stopped
    ports:
        - 8080:8080
    depends_on:
        - mariadb # (1)!
    volumes:
        # Optional erweitern (2)
        - ./mariadb/adminer/theme.css:/var/www/html/adminer.css
```

1. Der Adminer Container hängt vom **MariaDB Container** ab, da er auf die Datenbank zugreifen muss. Wenn der MariaDB Container nicht läuft, kann der Adminer Container nicht gestartet werden. Aus diesem Grund wird der MariaDB Container als **Abhängigkeit** angegeben.
2. Dieser Schritt ist **optional**! Der Adminer Container verwendet ein **Theme** ([Hydra](https://github.com/Niyko/Hydra-Dark-Theme-for-Adminer)). Dieses Theme wird in den Ordner `./mariadb/adminer` kopiert. Der Ordner wird dann in den Container gemountet.

## Verwendung

Adminer kann über den Browser unter `http://localhost:8080` aufgerufen werden. Es öffnet sich ein Fenster, in dem die Datenbankverbindung konfiguriert werden kann. Die Datenbankverbindung wird über die **IP Adresse** des MariaDB Containers hergestellt. Da die Container im selben Netzwerk sind kann auch einfach der Name des Containers verwendet werden. In diesem Fall ist der Name `mariadb`. Danach muss nur noch der **Benutzername** und das **Password** eingegeben werden. Das Passwort ist in der `docker-compose.yml` Datei zu finden.

Auf der Schaltfläche kann dann das Schema **erstellt** und **exportiert** werden. Es können auch **SQL Befehle** ausgeführt werden. Es ist möglich die ganze Datenbank über die Oberfläche zu **verwalten**. Die Schaltfläche sieht in etwa so aus:

![Hydra for Adminer - Schaltfläche](https://camo.githubusercontent.com/ba4cbce24fffb29ce5589dbc165ee627b56ee6ae13a07a50419a9e01aa8bb36c/68747470733a2f2f692e696d6775722e636f6d2f4c6b626f44785a2e706e67)
