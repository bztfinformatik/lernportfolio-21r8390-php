---
tags:
    - PHP
---

# Installation

Um PHP auszuführen, braucht es einen Webserver, welcher PHP versteht und verarbeiten kann. Dabei kann zwischen [Produktionsserver](#docker) und [Entwicklungsserver](#ide) unterschieden werden.

## Docker

Der Trend der [Containerisierung](https://www.redhat.com/de/topics/cloud-native-apps/what-is-containerization) hat sich auch auf PHP geschlagen. Über ein einfaches Dockerfile werden alle Abhängigkeiten installiert und aufgesetzt. Wenn mehr Leistung gebraucht wird, dann wird einfach ein neuer Container gestartet. Zudem wird einzig eine Installation von Docker benötigt. Eine Vorlage kann [hier :material-download:](Beispiele/DockerPHP.zip) heruntergeladen werden. Es ist PHP, [Adminier](https://www.adminer.org/), MySQL und Composer vorinstalliert.
(_Vorlage von: Herr Inauen_)

## XAMPP

Eine etwas **veraltete** und und nicht mehr empfehlenswerte Art PHP zu verwenden ist XAMPP. Dies ist ein kostenloser Webserver, welcher PHP versteht und verarbeiten kann. Mithilfe von XAMPP kann HTML, PHP, Perl und MariaDB ausgeführt werden. Der ganze [Tech-Stack](https://blog.hubstaff.com/technology-stack/) wird darüber verwaltet. Um XAMPP zu verwenden, muss nur das Programm installiert werden, welches sich auf der [offiziellen Webseite](https://www.apachefriends.org/index.html) befindet. Nach belieben können dann Einstellungen vorgenommen werden. Unter dem `C:\`-Laufwerk müssen dann die Dateien in den HT-Docs Ordner gelegt werden. Alle Dateien darin können dann über den Browser und den Namen aufgerufen werden.

Der **Nachteil** von diesem einfachen Setup ist, dass alles sich in einem Laufwerk befindet. Wenn mehrere Projekte im gleichen Ordner sind, dann gibt es Konflikte und erfordert [erweiterte Konfigurationen](https://tonyfrenzy.medium.com/xampp-serving-from-any-directory-outside-of-htdocs-22a93f1b8815). Zudem entspricht der Unterordner und Dateiname auch der URL. Routing oder Sonstiges, kann somit nicht ohne Weiteres gemacht werden. Wer mehrere ältere Projekte hat, der kann mit XAMPP leider nur eine PHP-Version verwenden.

## IDE

Für die **Entwicklung** mit mehreren Projekten oder unterschiedlichen Konfigurationen gibt es eine einfachere Lösung als XAMPP. Es gibt IDE's, welche das Ausführen und Entwickeln von PHP unterstützen. Darüber können unterschiedliche Versionen, Konfigurationen und Speicherordner verwendet werden.

### PHP-Storm

**Jetbrains** hat für jede bekannte Programmiersprache eine IDE. Somit gibt es auch eine für PHP, welche [Phpstorm](https://www.jetbrains.com/phpstorm/) heisst. Es bietet komplette Unterstützung für die grössten PHP-Frameworks und stellt nützliche Autovervollständigung zur Verfügung. Mithilfe der eingebauten Entwicklertools können Datenbanken, Docker und andere Tools verwendet werden. Der Nachteil von dieser IDE ist, dass sie **kostenpflichtig** ist.

### Visual Studio Code

Visual Studio Code kann mit unzähligen **Extensions** auch zur voll ausgerüsteten PHP-Entwicklungsumgebung werden. Dazu muss PHP als Binär und die Extension [Five-Server](https://marketplace.visualstudio.com/items?itemName=yandeu.five-server) heruntergeladen werden. In den Einstellungen muss dann nur noch angegeben werden, wo sich die PHP-Dateien befinden und schon kann es losgehen.
