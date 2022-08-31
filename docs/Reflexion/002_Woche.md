---
tags:
    - Reflexion
hide:
    - toc
---

# 2. Woche <span style="float:right">25.08.2022</span>

???+ tldr "Zusammenfassung"

    -   Docker Aufträge
        -   Was ist YAML
        -   Images anzeigen
        -   MySQL
    - PHP Rechnen
    - PHP Arrays
    - PHP HTTP Parameter

## Docker Aufträge

Unser **Wissen** über Docker haben wir anhand von unterschiedlichen Aufgaben aufgefrischt. Zuerst dokumentierte ich die wichtigsten [Befehle](../Docker/Start.md#befehle) und was der Sinn und Zweck einer [YAML-Datei](../Docker/Start.md#yaml) ist. Danach habe ich **Whalesay** und Hello-World Images auf meinem Rechner installiert, ausgeführt und dokumentiert. Zum Schluss habe ich einen **MySQL**-Container aufgesetzt und mich damit über die Konsole verbunden.

Für die Dokumentationen habe ich die offizielle [Docker](https://www.docker.com/) und [RedHat](https://www.redhat.com/en) Seiten verwendet. Diese haben meist ausführliche und verständliche Beschreibungen mit funktionstüchtigen Beispielen. Die **Aufträge** waren aus einem PDF, welche wir im Unterricht erhalten haben. Die [Aufträge](../Docker/Aufgaben.md) waren sehr gut strukturiert und haben mir geholfen, mein bestehendes Wissen zu vertiefen.

Durch die Aufgaben habe ich gelernt, wie man Container im **Hintergrund** ausführt und damit interagiert. Dazu waren die Befehle ausserordentlich hilfreich, da ich so sehen konnte was ausgeführt wird und wie der Container heisst. Das Verbinden zu einem Container war für mich komplett neu und lernte somit sehr vile über das **Networking** von Docker. Den Auftrag habe ich über die Konsole gemacht, was auf Zeit sehr aufwändig war. Nächstes Mal würde ich ein Compose File erstellen, um die Container zu starten, da so die **Umgebungsvariablen** sofort ersichtlich sind. Whalesay kannte ich zuvor schon von Linuxdistributionen ([Cowsay](https://cowsay.morecode.org/)), jedoch nicht in dieser modifizierten Form.

!!! example "Merksatz:"

    - YAML ist eine Sprache zur Serialisierung von Daten, die häufig zum Schreiben von Konfigurationsdateien verwendet wird.
    - Container können mithilfe von `docker images` aufgelistet werden.

Mir ist aufgefallen, dass wir **Applikationsentwickler** Docker gar nie als richtiges Modul behandelt haben, sondern es als selbstverständliches Können angesehen haben. Aus diesem Grund denke ich, dass es sehr wichtig ist, dass wir uns mit Docker auseinandersetzen und verstehen. Ich habe mich sehr gefreut, dass wir diese Woche mit Docker Aufträge begonnen haben, da ich so mein Wissen vertiefen konnte.

## PHP Rechnen

In jeder Programmiersprache ist es notwendig, dass man die grundlegenden **Rechnungsoperatoren** kennt. Wie man mit Variablen rechnet schauten wir deshalb in dieser Woche genauer an. Dazu erstellte ich eine Dokumentation über die bekannten [Operatoren](../PHP/Aufgaben.md#rechnen-mit-variablen). In der Dokumentation war es mir wichtig, dass es Beispiele hat, da diese schneller überflogen werden können.

Als Vorlage verwendete ich [PHP Einfach](https://www.php-einfach.de/php-tutorial/rechnen-mit-variablen/), was bereits Beispiele enthielt. Diese Beispiele schrieb ich mit meinen Präferenzen ab. Mithilfe meines eigenen Wissens erweiterte ich diese, damit sie vollständiger sind. **Bitwise** [Operatoren](https://www.educba.com/bitwise-operators-in-php/) habe ich jedoch weggelassen, da sie selten verwendet werden.

Bei diesen Aufgaben habe ich gelernt wie man Strings verknüpft. Alle anderen Operatoren verhalten sich gleich wie in anderen mir bekannten Programmiersprachen. Ich kann nun mit Variablen umgehen und sie nach belieben anwenden. Für mich war bisher nicht klar wieso **Strings** mit einem Punkt zusammengefügt werden. Nun weiss ich den [Grund](../PHP/Aufgaben.md#strings) dafür und finde es sogar Sinnvoll.

!!! example "Merksatz:"

    - Rechenoperatoren sind in grundsätzlich in allen Programmiersprachen dieselben.
    - Strings werden in PHP mit einem Punkt `.` zusammengefügt.

Bemerkt habe ich, dass Programmiersprachen grundsätzlich alle dieselben Rechenoperatoren haben. Die einzigen Unterschiede sind die **Syntax** und die **Semantik**. Die Semantik ist die Bedeutung der Operatoren. In PHP ist es zum Beispiel so, dass ein Punkt zwischen zwei Strings die beiden Strings zusammenfügt. Die Syntax ist die Schreibweise der Operatoren. Alle anderen Operatoren funktionieren in PHP gleich wie in anderen Sprachen auch.

## PHP Arrays

Sehr oft arbeitet man nicht nur mit einer Variable alleine sondern braucht eine **Sammlung** von Werten. Dazu werden in PHP Arrays verwendet, welche etwas Komplexer sind als man sich gewöhnt ist. Dabei wird zwischen Nummerisch und Assoziativ unterschieden. Die wichtigsten [Funktionen](../PHP/Arrays.md), welche für die Arbeit mit Arrays benötigt werden schrieb ich mir auf. Als Zusatzaufgabe habe ich einen eigenen Sortieralgorithmus anhand von [Quicksort](../PHP/Beispiele/Sortierung.php) implementiert.

!!! example "Merksatz:"

    - Nummerisch und Assoziativ sind die zwei verschieden Arten von Arrays die PHP unterstützt.
    - In PHP muss jede Methode einen anderen Namen besitzend, da es keine Methodenüberschreibung gibt.

## HTTP Parameter

!!! example "Merksatz:"

    - Vor dem Zugreifen auf einen Parameter muss überprüft werden, ob dieser überhaupt gesetzt wurde.
    - GET und POST sind die zwei HTTP-Methoden, die in PHP verwendet werden können.
