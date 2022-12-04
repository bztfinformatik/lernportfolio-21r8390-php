---
tags:
    - LB1
    - Datenbank
---

# Datenbank :octicons-database-16:

Eine Datenbank ist für die **Persistenz** der Daten zuständig. Sie speichert die Daten und stellt sie bei Bedarf wieder zur Verfügung. Die Datenbank ist ein zentraler Bestandteil eines jeden Systems. Ohne Datenbank wäre es nicht möglich, Daten zu speichern und wieder abzurufen. In diesem **Projekt** wird die Datenbank für das Speichern von den **Benutzern** und **Vorlagen** verwendet.

## Provider

Es gibt viele verschiedene **Datenbankentypen**, welche unterschiedliche Vor- und Nachteile besitzen. Für strukturierte Daten lohnt sich eine relationale Datenbank, da diese Verknüpfungen und Abhängigkeiten zwischen den Daten speichern kann. Für unstrukturierte Daten ist eine relationale Datenbank nicht geeignet, da diese Daten nicht in Tabellen gespeichert werden können. Für unstrukturierte Daten eignet sich eine **NoSQL Datenbank**. Diese Datenbanken speichern die Daten in einem **JSON** oder **Document** Format. Es gibt noch viele weitere Datenbanktypen, welche diese zwei Typen nicht abdecken. Diese Datenbanken werden in diesem Projekt nicht verwendet.

### Maria DB

Für dieses Projekt wird [MariaDB](https://mariadb.org/) verwendet, da ich es persönlich über [MySQL](https://www.mysql.com/) präferiere. MariaDB ist ein von der Gemeinschaft entwickelter **Fork** des relationalen Datenbankmanagementsystems **MySQL**, der unter der GNU GPL frei bleiben soll. MariaDB wird von Webanwendungen als Datenbankserver verwendet und wird auch von vielen großen Websites, darunter Facebook, Google und Wikipedia, als Datenbankserver genutzt. Der Vorteil von MariaDB ist, dass es eine vollständige Abwärtskompatibilität zu MySQL bietet, aber auch einige neue Funktionen und Verbesserungen enthält. Zudem ist es **Open Source** und unter der GNU GPL lizenziert, was bedeutet, dass es **kostenlos** und frei verfügbar ist.

## Container

Damit die Datenbank auf jedem System sich gleich verhält wird sie über einen [Docker Container](../Docker/Aufgaben.md#mysql) verwaltet. Mithilfe von **Umgebungsvariablen** wird die Datenbank konfiguriert. So kann die Datenbank auf jedem System gleich konfiguriert werden. Der Container wird mit dem **Docker Compose** gestartet.

```yaml title="MariaDB Container"
mariadb:
    image: mariadb
    restart: unless-stopped
    command: --default-authentication-plugin=mysql_native_password
    environment:
        MYSQL_DATABASE: ${DB_NAME}
        MYSQL_ROOT_PASSWORD: ${DB_ROOT_PASSWORD}
        MYSQL_USER: ${DB_USER}
        MYSQL_PASSWORD: ${DB_PASSWORD}
    volumes:
        - ./mariadb/initscripts:/docker-entrypoint-initdb.d # (1)!
        - ./mariadb/sysdata:/var/lib/mysql/ # (2)!
```

1. Der MariaDB Container verwendet [Init Scripts](Initscripts.md). Dieses Script wird beim Start des Containers ausgeführt. In diesem Fall wird das **Datenbank Schema** erstellt.
2. Damit die Datenbank auch nach einem **Neustart** des Containers noch vorhanden ist, werden die Daten in einem Ordner gespeichert. Ansonsten würden die Daten nach einem Neustart des Containers **gelöscht** werden.

### Umgebungsvariablen

Da in der Composer Datei noch weitere Container mit eigenen **Umgebungsvariablen** definiert sind, werden diese in einer **.env** Datei gespeichert. Dies förder die Übersichtlichkeit und vereinfacht das **Ändern** der Umgebungsvariablen. Zudem ist es so nicht möglich, dass **abhängige** Werte unterschiedlich sind. Beim Starten werden dann die **Platzhalter** (z.B. `${DB_NAME}`) durch die eigentlichen Werte ersetzt.

```c title=".env Konfiguration"
# Database settings
DB_NAME=mksimple //(1)!
DB_ROOT_PASSWORD=SuperSecretPassword //(2)!
DB_USER=mkdocs_user //(3)!
DB_PASSWORD=mkdocs_password //(4)!
```

1. Der Name der Datenbank, welche erstellt werden soll.
2. Das Passwort des **Root** Benutzers. Dieser Benutzer hat **vollständige** Zugriffsrechte auf die Datenbank und sollte nur für die Erstellung der Datenbank verwendet.
3. Der Name des **Benutzers**, welcher die Datenbank verwenden soll. Über diesen sollte die Applikation mit der Datenbank sprechen. Dieser Benutzer hat nur **Lese-** und **Schreibrechte** auf die Datenbank.
4. Das Passwort des **Benutzers**. Dieses Passwort sollte **nicht** das gleiche wie das des **Root** Benutzers sein.
