---
tags:
    - Docker
---

# Docker :material-docker:

Docker macht die Entwicklung effizient und vorhersehbar. Es nimmt repetitive, banale Konfigurationsaufgaben ab und wird während des gesamten Entwicklungslebenszyklus für eine schnelle, einfache, portable und isolierte **Entwicklungsumgebung** eingesetzt - auf dem Desktop und in der Cloud. Die umfassende End-to-End-Plattform von Docker umfasst Benutzeroberflächen, Befehlszeilen (CLIs), APIs und Sicherheitsfunktionen, die so konzipiert sind, dass sie über den gesamten Lebenszyklus der Entwicklungsumgebung hinweg zusammenarbeiten. Durch die vielen [Vorteile](https://www.redhat.com/de/topics/containers/what-is-docker#die-vorteile-von-docker-containern) von Docker ist es möglich, eine Entwicklungsumgebung zu erstellen, die sich auf einem Desktop und einem Server gleich verhaltet.

> Originaltext von [Docker](https://www.docker.com/)

## Docker File

Docker kann Images automatisch erstellen, indem es die Anweisungen aus einem **Dockerfile** einliest. Ein Dockerfile enthält Befehle, die ein Nutzer auf der Befehlszeile aufrufen könnte, um ein Image zusammenzustellen. Es ist somit ein Bauplan für ein Docker Image. Über den Befehl `docker build .` wird ein Image zusammengebaut.

```Dockerfile title="Beispiel Dockerfile"
FROM php:7.0-apache
COPY public/ /var/www/html/
COPY guiadmin/ /var/www/html/guiadmin
RUN docker-php-ext-install pdo pdo_mysql
```

## Docker Compose

Docker [Compose](https://docs.docker.com/compose/) ist die **CLI**, mit welcher eine einfache Konfiguration für Docker erstellt werden kann. Sie enthält eine Liste von Docker-Komponenten, die in einem Docker-Container ausgeführt werden. Eine Docker-Komponente ist ein Docker-Image, welches eine Anwendung enthält. Die Konfigurationsdatei ist in `yaml` geschrieben und könnte wie folgt aussehen:

```yaml title="Docker Compose Beispiel Konfiguration"
version: "3.x" # (1)
services: # (2)
    php: # (3)
        build: ./php # (4)
        restart: always # (5)
        ports: # (6)
            - 8008:80

    mysql:
        image: mysql:8 # (7)
        ports:
            - 3306:3306
        command: "start" "/c" "internet.exe" # (8)
        environment: # (9)
            MYSQL_USER: user
        volumes: # (10)
            - ./app:/var/www/html
```

1.  Zu Beginn sollte die Version von Docker Compose angegeben werden. Ansonsten kann es bei Versionsunterschiede zu unterschiedlichen Ergebnissen kommen.
2.  Unter `services` werden die unterschiedlichen Aufgaben angegeben.
3.  Hier kann der Name des Containers angegeben werden. Dieser wird zum Identifizieren des Containers verwendet. Gleichzeitig ist der Servicename auch der **Hostname**.
4.  Unter dieser Option kann der Pfad zum `Dockerfile` angegeben werden.
5.  _(Optional)_ Mit dieser Option kann festgelegt werden, wie der Container gestartet werden soll und was bei einem Absturz geschehen sollte. Mögliche Werte sind `no`, `on-failure`, `always` und `unless-stopped`.
6.  Interne Ports müssen mit dem Host verknüpft werden. Dies geschieht mit dem Syntax `host:container`. Der Host ist der Port auf dem Hostsystem, der Container ist der Port im Container.
7.  Docker Files müssen nicht von Hand geschrieben werden. Es gibt bereits vorgegebene [Images](https://hub.docker.com/search?q=&type=image&image_filter=official), welche voll funktionsfähig sind.
8.  Manchmal ist es nötig einen Befehl beim starten eines Containers auszuführen.
9.  Mithilfe von Environment Variablen können Konfigurationen und Werte gesetzt werden.
10. Mit dieser Option können Daten zwischen Host und Container geteilt werden. Der Pfad auf dem Hostsystem muss mit dem Pfad im Container angegeben werden. Dies geschieht mit der Syntax `host:container`.

### Befehle

Die Container können anhand dieser Konfiguration über den Befehl `docker compose up` **gestartet** werden. Mit dem Befehl `docker compose down` können die Container wieder **heruntergefahren** werden. Wenn der Container über ++ctrl+c++ gestoppt wird, dann wird der aktuelle Stand gespeichert.

**Laufende Images** können über den Befehl `docker compose images` ausgeben werden. Dort sieht man den Namen und die Id des Containers. Über die ID können dann weitere Werte ausgeben werden. Mit dem Befehl `docker compose ps` können die Laufwerke, Ports und Service der laufenden Container ausgegeben werden. Alle installierten Images können mit `docker images` aufgelistet werden.

### YAML

YAML ist ein Dateiformat, welches strukturiert Daten speichert. Es ist ein [Markup Language](https://www.redhat.com/en/topics/automation/what-is-yaml), welches in der Regel für Konfigurationsdateien verwendet wird. YAML ist ein [Indentation Based](https://www.tutorialspoint.com/yaml/yaml_indentation_and_separation.htm) Markup Language. Das bedeutet, dass die Einrückung der Zeilen eine Rolle spielt. Die Einrückung wird mit Leerzeichen oder Tabs gemacht. Die Einrückung kann beliebig sein, solange sie konsistent ist. Es wird nach einem **Objektorientierten-Key-Value-Prinzip** gearbeitet. Eingegebene Werte können gleich beim Schreiben validiert werden.

## Container-Virtualisierung

Das Verlangen nach einer effizienten und sicheren **Entwicklungsumgebung**, welche betriebssystemunabhängig und ohne Probleme konfigurierbar ist, sollte mit Docker behoben werden. Mithilfe von Virtualisierung wird eine virtuelle Maschine erstellt, welche eine eigene Hardwareumgebung besitzt. Diese Umgebung kann mit einem Betriebssystem und einer Anwendung konfiguriert werden. Docker ist eine Alternative zu [Virtualisierung](https://cloudacademy.com/blog/container-virtualization/). Es ist eine Software, welche die Anwendung in einen Container packt und diese Container auf einem Hostsystem ausführt. Docker ist somit eine Art Virtualisierung, jedoch ohne **Hardwarevirtualisierung**.
