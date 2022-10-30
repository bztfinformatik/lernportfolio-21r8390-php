---
tags:
    - Reflexion
hide:
    - toc
---

# 1. Woche <span style="float:right">18.08.2022</span>

???+ abstract "Zusammenfassung"

    -   [Dokumentation eingerichtet](#dokumentation-eingerichtet)
    -   [Docker angeschaut](#docker-angeschaut)
    -   [PHP aufgesetzt](#php-aufgesetzt)
    -   [PHP Basics](#php-basics)

## Dokumentation eingerichtet

Heute richteten wir als Erstes diese **Dokumentation** ein. Von Herrn Inauen bekamen wir eine [Vorlage](https://github.com/chrisinabztf/docsify-starter-template), welche bereits mit [Docsify](https://docsify.js.org/) eingerichtet war. Ich persönlich präferiere [MkDocs](https://squidfunk.github.io/mkdocs-material/), da es mehr eingebaute Komponenten und Einstellungen besitzt. Das Aufsetzen und Lernen des Syntax ist dafür etwas schwieriger. Mithilfe von [GitHub Actions](https://github.com/bztfinformatik/lernportfolio-21r8390-php/actions/workflows/ci-mkdocs.yml) automatisierte ich das Erstellen und Veröffentlichen der Dokumentation.

Die Dokumentation richtete jeder selbst ein. Während dieser Zeit ging ich im Klassenzimmer herum und half beim Aufsetzen. Ich half beim Einrichten der automatischen Veröffentlichung in GitHub. Um dies nicht jedes Mal erneut zu zeigen, erstellte ich hier auch eine kurze [Anleitung](../Appendix/GitHubPages/Einrichten.md) dazu.

Dadurch habe ich gelernt, dass es für Anfänger einfacher ist, auf einer gegebenen **Vorlage** weiterzuarbeiten als von Grund auf etwas aufzubauen. Wenn ich nächstes Mal meinem Unterstift eine Aufgabe geben muss, dann werde ich ihm Beispiele oder eine Vorlage beilegen, damit er ein **Grundgerüst** hat. Da ich das Einrichten der GitHub Seite schon sehr oft gemacht hatte, konnte ich das ohne Schwierigkeiten erledigen. Zusätzlich hatte ich von der [letzten Projektarbeit](https://bztfinformatik.github.io/lb1_doku-21r8390/) bereits eine Vorlage für MkDocs.

!!! example "Merksatz:"

    - Anleitungen zu schreiben hilft, das Thema zu vertiefen und genauer zu verstehen.
    - Vorlagen sind für Anfänger einfacher zu verstehen als von Grund auf etwas aufzubauen.

Mir ist aufgefallen, dass das Lernjournal mehrere [Anforderungen](000_Vorlage.md) besitzt. Um diese im Überblick zu behalten, erstellte ich eine Liste. Nach der Checkliste ist dieses und die folgenden **Journale** aufgebaut.

## Docker angeschaut

Für die Dokumentation und unser PHP-Projekt werden wir **Docker** verwenden. So kommt es nicht drauf an, ob Windows oder Linux als Betriebssystem verwendet wird. Zudem haben alle Beteiligten dieselbe PHP-Version und können so Fehler besser finden.

Da ich Docker bereits kenne, konnte ich mir die Dokumentation durchlesen und mir die **wichtigsten** Befehle merken. Ich habe mir die Dokumentation von [Docker](https://docs.docker.com/) und [Docker Compose](https://docs.docker.com/compose/) durchgelesen. Die wichtigsten Komponenten [notierte](../Docker/Start.md) ich mir.

Gelernt habe ich, dass Docker für das Beheben von **Sicherheitslücken** unheimlich nützlich ist. Da Docker Container **isoliert** sind, können sie nicht auf andere Container zugreifen. Wenn ein Container gehackt wird, dann kann er nur auf die Daten des Containers zugreifen, nicht aber auf die Daten der anderen Container. Für das Lösen einer Sicherheitslücke im Programm, das im Container läuft, muss nur der Container mit einem Patch neu gestartet werden.

!!! example "Merksatz:"

    - Mithilfe Docker kann eine einheitliche Umgebung erstellt werden.
    - Docker und virtuelle Maschinen sollte man nicht mischen.

In meinem Unternehmen wird Docker nicht verwendet, da alle dieselbe Installation haben und auf Windows arbeiten. Dies erlaubt keine Präferenzen. Zusätzlich haben wir nur einen Server, was das Isolieren unnötig macht.

## PHP aufgesetzt

In diesem Modul verwenden wir PHP, was natürlich auch eine [Installation](../PHP/Installation.md) von PHP benötigt. Wie bereits erwähnt, haben wir PHP über Docker **installiert**. Zusätzlich zu PHP ist auch eine Datenbank hinterlegt. Diese Datenbank wird von [Adminer](https://www.adminer.org/) verwaltet. Es ist eine **Alternative**, welche sich leichter bedienen lässt als phpMyAdmin.

Für die Installation von PHP mit Docker bekamen wir eine [Vorlage](../Appendix/Struktur/Struktur.md) von Herrn Inauen. Diese Vorlage beinhaltet bereits eine `docker-compose.yml` Datei, welche die Container erstellt. Aufsetzen machte jeder selbst, da man eigentlich nur den Container ausführen musste.

!!! example "Merksatz:"

    - Docker sollte über All-In-One Installationen ([XAMPP](https://www.apachefriends.org/index.html)) bevorzugt werden.
    - Eine einheitliche Verwaltung von Entwicklungstools vereinfacht das Fehler finden.

Ich persönlich präferiere [phpMyAdmin](https://www.phpmyadmin.net/), da ich damit schon Erfahrung habe. Mit Adminer beschäftigte ich mich aber auch und konnte es bedienen. Beide Benutzeroberflächen finde ich vom Aussehen jedoch **veraltet**. Ich hoffe, dass die Entwickler in Zukunft etwas Moderneres erstellen. Mein eigenes Hosting von [MariaDB](https://mariadb.org/) läuft über phpMyAdmin, weswegen ich dies besser kenne.

Im Betrieb verwenden wir [SQL Server](https://www.microsoft.com/en-us/sql-server/sql-server-2022) und [PostgreSQL](https://www.postgresql.org/). Zum Managen verwenden wir jedoch die offiziellen Tools von Microsoft ([SSMS](https://docs.microsoft.com/en-us/sql/ssms/download-sql-server-management-studio-ssms?view=sql-server-ver16)) und PostgreSQL ([pgAdmin](https://www.pgadmin.org/)). Den Syntax einer weiteren Datenbank zu kennen ist für mich sehr wichtig, da ich in Zukunft mit anderen Datenbanken arbeiten möchte.

## PHP Basics

Um die **Grundlagen** von PHP zu verstehen, habe ich mir unterschiedliche Dokumentationen über PHP durchgelesen. Den Inhalt der Seiten fasste ich in einer [Zusammenfassung](../PHP/Basics.md) zusammen. In der habe ich Beispiele erstellt und beschrieben. Die Ausgaben zeigte ich auch, damit man das Skript nicht selbst ausführen muss.

Im Unterricht verwenden wir die [PHP Einfach](https://www.php-einfach.de) Seite. Sie ist sehr gut für **Anfänger** geeignet, da sie die Grundlagen erklärt und nicht zu kompliziert ist. Der Inhalt der ersten Kapitel geht es um das Ausgeben von Werten, Schreiben von Kommentaren und den Umgang mit Variablen. Es gibt aber auch Abschnitte über SQL und erweiterte PHP-Methoden. Zusätzlich verwendete ich [W3School](https://www.w3schools.com/php/php_ref_overview.asp), was für mich eine etwas übersichtlichere Seite ist.

Den **Unterschied** zwischen Funktion und Methode habe ich gelernt. Bisher habe ich einfach akzeptiert, dass etwas mit Name und danach zwei Klammern `name()` eine Methode ist. Dies ist jedoch nur der Fall, wenn die Methode in einer Klasse oder einem Objekt definiert ist. Eine Funktion ist eine Methode, die nicht in einer Klasse oder einem Objekt definiert ist. Da PHP auch ausserhalb von Klassen verwendet werden kann, ist es wichtig zu wissen, wie man dies fachbegrifflich nennt.

!!! example "Merksatz:"

    - Eine Methode ist eigentlich eine Funktion, die im Kontext einer Klasse oder eines Objekts verwendet wird.
    > ~ [StackOverflow](https://stackoverflow.com/questions/4841605/what-is-a-difference-between-a-method-and-a-function)

Mir ist aufgefallen, dass ich vom ÜK (_M307_) alle Basics bereits kenne. Dort haben wir eigentlich alles, was auf der PHP-Einfach Seite steht, schon überflogen. Später in diesem Modul werden wir jedoch Fortgeschritteneres machen. Für das ist es notwendig, dass die Grundlagen sitzen.
