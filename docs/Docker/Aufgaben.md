---
tags:
    - Docker
    - Beispiele
---

# Docker-Aufgaben

Das hier ist eine Sammlung von verschiedenen Docker **Beispielen**. Sie sollten zum lernen und verstehen von Docker behilflich sein.

## Whalesay

Cowsay ist ein Linux **Spiel**, welches eine Kuh auf dem Bildschirm ausgibt. Diese Kuh kann einen Text sagen. Das Spiel ist sehr beliebt und wird in vielen Linux Distributionen mitgeliefert. Es gibt auch eine [Docker Image](https://hub.docker.com/r/docker/whalesay) für Whalesay. Dieses Image ist eine Modifizierung von Cowsay, welche einen Wal ausgibt.

=== "Whalesay ausführen"

    ```bash title="Der letzte Parameter ist der Text, welcher ausgegeben wird"
    docker run docker/whalesay cowsay "Hey! Gefällt dir diese Doku?"
    ```

=== "Ausgabe"

    ```plaintext
          ______________________________
         < Hey! Gefällt dir diese Doku? >
          ------------------------------
            \
             \
              \
                            ##        .
                      ## ## ##       ==
                   ## ## ## ##      ===
               /""""""""""""""""___/ ===
          ~~~ {~~ ~~~~ ~~~ ~~~~ ~~ ~ /  ===- ~~~
               \______ o          __/
                \    \        __/
                  \____\______/
    ```

## MySQL

MySQL ist eine Datenbank, welche in vielen Projekten verwendet wird. Es gibt ein [Docker Image](https://hub.docker.com/_/mysql) für MySQL. Dieses Image kann verwendet werden, um eine MySQL Datenbank zu starten. Wie die meisten Docker Images kann das Neuste mit dem Tag `latest` verwendet werden. So ist sichergestellt, dass immer die neuste und sicherste **Version** verwendet wird.

Mithilfe von **Umgebungsvariablen** wird MySQL konfiguriert. Mithilfe von `-e` Können diese Variablen gesetzt werden. Wenn nicht genügend gesetzt sind, dann wird ein Fehler ausgegeben. Der Parameter `--name` besagt wie der Container heissen soll. Über diesen Namen kann dann auch darauf zugegriffen werden. Damit der Container richtig läuft braucht es ein Passwort. Dieses kann über `-e MYSQL_ROOT_PASSWORD=` gesetzt werden. Mit `MYSQL_DATABASE` kann eine Datenbank erstellt werden. `MYSQL_USER` und `MYSQL_PASSWORD` sind für das erstellen eines Standardbenutzers zuständig. Über `MYSQL_RANDOM_ROOT_PASSWORD` kann ein zufälliges Passwort gesetzt werden, welches in der Konsole dargestellt wird.

```bash title="MySQL Container starten"
docker run --name some-mysql -e MYSQL_ROOT_PASSWORD=my-secret-pw -d mysql:latest
```

Der Container läuft im Hintergrund, da `-d` (`--detach`) als Parameter hinterlegt wurde. Um den **Status** des Containers zu überprüfen, kann `docker ps` verwendet werden. Dieser Befehl zeigt alle laufenden Container an. Mit `docker logs` kann der Log des Containers ausgegeben werden. Dieser Befehl kann auch mit dem Namen des Containers verwendet werden. Um sich mit dme Container zu **verbinden** kann dieser Befehl verwendet werden:

```bash title="Mit Container verbinden"
docker exec -it some-mysql mysql -pmy-secret-pw
```

**SQL-Skripts** können entweder beim Starten des Containers oder nachträglich ausgeführt werden. Alle Skripts, die sich im Laufwerk `docker-entrypoint-initdb.d` befinden, werden beim Starten ausgeführt. Für das spätere hinzufügen kann das Skript in den Container kopiert werden. Dies kann mit folgendem Befehl geschehen:

```bash title="Datei importieren"
docker exec -it some-mysql mysql -pmy-secret-pw database_name < path-to-file.sql
```
