---
tags:
    - Reflexion
hide:
    - toc
---

# 4. Woche <span style="float:right">08.09.2022</span>

???+ tldr "Zusammenfassung"

    -   SSR vs CSR
    -   CSR Projekt
    -   Dateien
    -   Do's and Don'ts (PHP)

## SSR vs CSR

PHP ist eine [Serverseitige](../Appendix/Rendering/Rendering.md) Programmiersprache. Um zu verstehen was dieser Satz **bedeutet**, mussten wir zuerst verstehen was Serverseitig bedeutet und was für Alternativen es gibt. Wir schauten uns die Begriffe **SSR** und **CSR** an und besprachen die Vor- und Nachteile. Damit wir uns mit dem Aufbau der beiden Begriffe genau auseinandersetzen mussten wir ein [Diagramm](../Appendix/Rendering/Rendering.md#diagramm) über CSR machen.

Die Unterschiede besprachen wir zusammen in der Klasse und schrieben die Eigenschaften an die Wandtafel. Für **vertieftes Wissen** nahm ich mir die Webseite [Toptal](https://www.toptal.com/front-end/client-side-vs-server-side-pre-rendering) zur Hilfe. Dort wurde die Unterschiede nochmal genauer erklärt. Das **Diagramm** wurde von mir mit [Mermaid](https://jojozhuang.github.io/tutorial/mermaid-cheat-sheet/) erstellt, was eine Alternative zu PlantUML ist.

Ich wusste, dass es unterschiedliche **Renderarten** gibt und habe mich auch schonmal damit auseinandergesetzt. Was aber die genauen **Argumente** für die einzelnen Renderarten sind, wusste ich nicht. Wenn ich das nächste Mal ein Projekt starte, dann werde ich mir nun zuerst überlegen welche Renderart **sinnvoll** ist. Je nach dem könnte es für den Anwender einfacher sein, wenn ich eine andere Renderart wähle. Diagramme mit Mermaid zu erstellen war für mich komplett neu, weswegen ich mich dort auch zuerst einlesen musste. Die grosse **Akzeptanz** von Mermaid hat mich überrascht, was der Grund dafür ist, dass ich es nun öfters verwenden werde.

!!! example "Merksatz:"

    - Serverseitiges rendern (SSR) ist die Voraussetzung für eine gutes **SEO**.
    - Clientseitig rendern (CSR) ermöglicht eine **bessere Performance** und **bessere UX**.

MkDocs unterstützt kein direktes verbauen von PlantUML als **Codeschnipsel**. Für Diagramme wird auf Mermaid gesetzt, was andere grosse Firmen ([GitHub](https://github.blog/2022-02-14-include-diagrams-markdown-files-mermaid/)) auch machen. Somit war ich gezwungen es einmal auszuprobieren. Es ist sehr einfach zu bedienen und hat die gleichen **Funktionalitäten** wie PlantUML.

## CSR Erweiterung

Als Aufgabe mussten wir ein [CSR-Projekt](../Appendix/Rendering/Rendering.md#beispielprojekt) erstellen. Dieses sollte Daten aus einem Backend laden und in einer Liste darstellen. Über einen **Hinzufügen** Knopf können weitere Entitäten zur Liste hinzugefügt werden. Die Schwierigkeit bei der ganzen Aufgabe war, dass es über `Ajax` funktionieren sollte. Das heisst, dass die Daten über **JavaScript** geladen werden und nicht über PHP.

Um zu sehen wie Grundsätzlich ein CSR-Projekt aufgebaut ist schauten wir in der Klasse ein **Beispielprojekt** an. Dort wurden die Abfragen bereits mit [Ajax](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX) umgesetzt, es hatte jedoch nur statische Daten. Dazu mussten wir uns mit der Ajax-Funktion `$.ajax()` auseinandersetzen. Diese Funktion ist sehr mächtig und kann viele verschiedene **Parameter** haben. Für das Projekt nahm ich mein altes **M307 Projekt** und baute es, mit meinem neu gelernten Wissen aus diesem Modul, um. Nun sind alle Methoden dokumentiert und XSS sollte nicht mehr möglich sein. Die Daten werden in einer SQLite Datenbank gespeichert, damit sie beständig bleiben.

Mein Wissen über Ajax habe ich aufgefrischt und vertieft. Ich weiss nun wie ich **Abfragen** machen kann und Werte überliefere. Zusätzlich habe ich gelernt wie ich **PHP von JavaScript** aus aufrufen kann. Das war für mich etwas neues, da ich bisher immer PHP von PHP aus aufgerufen habe.

!!! example "Merksatz:"

    -  `$.ajax()` ist eine sehr mächtige Funktion, die viele verschiedene **Parameter** hat.

Mir ist aufgefallen, dass ich seit dem ÜK sehr viel neues dazugelernt habe und mittlerweile vieles schöner schreiben könnte. Ich werde mich nun darum bemühen, dass ich meine Projekte **sauberer** schreibe und **kommentiere**.

## Dateien

Wenn keine Datenbank verwendet wird, dann müssen die Daten in einer anderen Art gespeichert werden. Meist ist der naheliegendste Weg das Schreiben in eine Datei. Wie dies in PHP funktioniert, haben wir als **Hausaufgabe** gelernt. Die wichtigsten Funktionen wie `lesen`, `schreiben`, `umbenennen` und `löschen` hielt ich in der [Dokumentation](../PHP/Aufgaben/Dateien.md) fest. Ich testete die Funktionen und erweiterte meine Unterlagen mit nützlichen **Beispielen**.

Als **Vorlage** für meine Dokumentation verwendete ich [PHP-Einfach](https://www.php-einfach.de/php-tutorial/php-datei/), welche eine solide Struktur gaben. Mit der Vollständigkeit war ich nicht zufrieden, weswegen ich noch weitere Informationen hinzufügte. Dafür schaute ich mich im **Internet** nach diversen anderen Tutorials um.

Ich habe gelernt, dass sich Dateien in PHP nicht sonderlich komplizierter als in anderen Sprachen verhalten. Wenn ich mit Daten gearbeitet habe, dann verwendete ich auch immer gleich eine **Datenbank** und bin nicht auf die Idee gekommen, dass ich eine Datei verwenden könnte. Da ich nun aber den Umgang damit beherrsche werde ich Dateien für **Prototypen** verwenden.

!!! example "Merksatz:"

    - Funktionen, die etwas mit Dateien zu tun haben, geben einen `bool` zurück, ob die Aktion erfolgreich war.
    - Standardmässig wird beim beschrieben einer Datei der Inhalt überschrieben.

PHP hat für gewisse Anwendungsfälle mehrere Methoden. Den genauen **Überblick** über alle diese zu behalten ist sehr schwierig. In jedem Tutorial wird eine andere Methode für das Beschreiben verwendet. Wann ich welche verwenden sollte habe ich noch nicht herausgefunden.

## PHP - Do's and Don'ts

Als Repetition schauten wir an was der PHP-**Syntax** zulässt und was für Ausgaben generiert werden können. Dabei ging es um die **Anführungszeichen** von Strings und was für eine Auswirkung diese auf den Inhalt haben. Zusätzlich schauten wir uns an was für Zeichen Variablen nicht enthalten dürfen und wie PHP mit **Out-Of-Bound** Abfragen in Arrays reagiert.

Herr Inauen erstellte eine **Präsentation**, welche die Fragen beinhaltete. Diese Fragen wurden dann zuerst in kleineren Gruppen und später in der Klasse besprochen. Die Lösung der Aufgaben [dokumentierte](../PHP/Appendix/DosAndDonts.md), damit ich später mein mein Wissen in kürzester Zeit wieder aktivieren kann.

Als ich heute lernte, dass PHP bei Zugreifen auf einen **nicht belegten Platz** im Array keine Fehlermeldung sondern **nichts** ausgegeben wird, war ich zu tiefst verwundert. Für mich macht es keinen Sinn bei einem Programmierfehler keine Meldung auszugeben. Das Verhalten kann zwar in den Einstellungen geändert werden, ist jedoch für mich als Standard **inakzeptabel**. Bis zum heutigen Tag dachte ich auch, dass PHP gleich wie Java keine [Interpolation](https://www.php.net/manual/en/language.types.string.php#language.types.string.parsing) unterstützt. Von nun an werde ich weniger mit dem Concatinator arbeiten und mehr gleich lesbare Strings erstellen. Als **Hilfe** sollten immer die einfachen Anführungszeichen verwendet werden und nur wenn das interpretieren von Variablen gewünscht ist die Anderen.

!!! example "Merksatz:"

    - Variablen dürfen nur **ASCII-Zeichen**, **Zahlen am Ende** und keine **reservierten Wörter** enthalten.
    - Doppelte Anführungszeichen (:material-format-quote-close:) ermöglichen [String Interpolation](https://stackoverflow.com/a/43437427/16632604).
