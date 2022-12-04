---
tags:
    - LB1
    - Datenbank
---

# Init-Scripts

Init-Scripts sind **SQL-Scripts**, die beim Starten des Containers ausgeführt werden. Sie sind dafür gedacht, dass die Datenbank beim Starten des Containers **mit Daten befüllt** wird. Initscripts werden **nur einmal** beim Starten des Containers ausgeführt. Wenn Sie die Datenbank neu starten, werden die Initscripts **nicht** erneut ausgeführt.

## Ordnerstruktur

Um eine übersichtliche **Ordnerstruktur** zu haben, wurden die SQLScripts im Ordner `./mariadb/initscripts` abgelegt. Beim Starten des [Containers](Start.md#container) werden die Scripts in den Ordner `/docker-entrypoint-initdb.d` kopiert. Dieser Ordner wird beim Starten des Containers automatisch von **MariaDB** ausgeführt.

```csharp title="Ordnerstruktur"
mariadb
│   README.md //(1)!
├───adminer //(3)!
│       theme.css
├───initscripts
│       200_User.sql
│       220_Project.sql
│       300_User.sql
│       320_Project.sql
└───sysdata
```

1. Im README wird nochmlas kruz erklärt, was die Ordnerstruktur ist.
2. Der Ordner `./mariadb/adminer` wird für das Theme verwendet. Dieses Thema wird im [Adminer](Adminer.md) Kapitel erklärt.

## Reihenfolge

Gewisse Aufgaben müssen vor anderen Passieren. Deshalb ist es wichtig, dass die Initscripts in der **richtigen Reihenfolge** ausgeführt werden. Die Skripte werden in der **alphabetischen** Reihenfolge ausgeführt, in der sie im Ordner aufgelistet sind. Mithilfe der Benennung kann die Reihenfolge der Ausführung der Skripte festlegen. Schlau ist es z.B. die Skripte mit einer **Nummer** zu versehen, die die Reihenfolge angibt.

### Aufteilung

Für die Benennung der Dateien bin ich nach folgendem Schema gegangen:

| Nummer  | Definition                         |
| :-----: | ---------------------------------- |
| **100** | Konfigurationen & Administratives  |
| **200** | Erstellt die Tabellen              |
| **300** | Fügt die Daten in die Tabellen ein |

So ist die Reihenfolge der Ausführung der Skripte:

```markdown title="Reihenfolge"
1. (100) Konfigurationen & Administratives
    1. Gibt es aktuell noch keine
2. (200) Erstellen der Tabellen
    1. 200_User.sql
    2. 220_Project.sql
3. (300) Füllen der Tabellen mit Daten
    1. 300_User.sql
    2. 320_Project.sql
```

### Benennung

Auch bei der Benennung der Dateien wurde sich Gedanken gemacht. Die erste Zahl gibt an, in welcher **Reihenfolge** die Datei ausgeführt wird. Die zweite Zahl gibt an, für welche **Tabelle** die Datei zuständig ist. Somit ist klar ersichtlich, dass `220` und `320` für die Tabelle `Project` zuständig sind. Zudem haben beide als Endung den **Tabellennamen**, damit auch von aussen klar ist, für welche Tabelle gedacht ist.

## Sysdata

Damit die Daten auch beim beenden des Containers **nicht verloren** gehen, werden die Daten in den Ordner `sysdata` gespeichert. Dieser Ordner wird beim Starten des Containers wieder eingelesen. Der Ordner beinhaltet das ganze Verzeichnis, welches von MariaDB verwendet wird und ist somit ständig **synchronisiert**. Wenn die Init-Scripts erneut ausgeführt werden sollten, dann muss dieser Ordner **gelöscht** werden. Dieser Ordner wird **nicht** automatisch gelöscht, da er auch für die Datenbank **nicht** benötigt wird.
