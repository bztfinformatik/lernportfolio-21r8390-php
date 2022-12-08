---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 5. Woche <span style="float:right">15.09.2022</span>

???+ abstract "Zusammenfassung"

    -   [Entwicklung vs Produktion](#entwicklung-vs-produktion)
    -   [MVC - Design Pattern](#mvc-design-pattern)
        -   Vortrag
    - [Objekt Orientierte Programmierung](#objekt-orientierte-programmierung)

## Entwicklung vs Produktion

In der heutigen Lektion, besprachen wir den **Unterschied** von Produktions- und Entwicklungsumgebung. Im ersten Fall möchte man möglich keine **Fehlermeldungen** und wenn, dann nur mit den essentiellen Details. Ganz im Gegenteil möchte man während dem Entwickeln auch über kleinere Fehler ausführlich informiert werden. Wie man dies umstellt dokumentierte ich unter der [Installation](../PHP/Installation.md).

Wie man dies im Docker umstellt zeigte uns Herr Inauen in seiner Präsentation. Die **Verhalten** verglich ich und versuchte zu verstehen was für Änderungen gemacht werden. Die gegebenen Informationen reichten mir nicht aus, weswegen ich im [Internet](https://dev.to/flippedcoding/difference-between-development-stage-and-production-d0p) nachforschte. Im **Basisprojekt** wurde bereits die Einstellungen gemacht, was einfaches Verständnis ermöglichte.

Für das nächste Mal würde ich mir mehr Informationen als nur der Code wünschen, um besser zu verstehen wieso welche Änderungen gemacht werden. Auch die Dokumentation ist nicht sehr hilfreich, da sie nur die **Befehle** erklärt und nicht die **Gründe**. Ich denke, dass es für mich hilfreich wäre, wenn ich die **Gründe** verstehen würde, da ich dann besser nachvollziehen kann, was ich tue. Wenn ich das nächste Mal eine PHP-Applikation veröffentliche, dann werde ich darauf achten.

!!! example "Merksatz:"

    - Der Endkunde sollte nicht mit Fehlern konfrontiert werden und vor allem nicht, mit welchen die sensitiven Daten enthalten.
    - Je nach Einstellungen wird unterschiedlich Stark auf Fehler reagiert.

Andere Programmiersprachen wie Java oder C# haben auh unterschiedliche **Umgebungen**. In der Produktion wird der Code überarbeitet und vereinfacht, damit er weniger Speicherplatz benötigt und effizienter ist. Dies ist nicht der Fall bei der Entwicklungsumgebung, da dort der Code während der Laufzeit inspiziert werden sollte.

## MVC - Design Pattern

[Model View Component](../LB1/Beschreibung/MVC.md) ist ein **Design Pattern** was die Benutzeroberfläche und die Businesslogik unabhängig machen sollte. Es hilft bei der Wartbarkeit und wird sehr oft in der Webentwicklung verwendet. Im Unterricht schauten wir uns das Pattern an, um es später in unserem eigenen Projekt anzuwenden.

Wir Applikationsentwickler haben bereits Grundkenntnisse über MVC. Aus diesem Grund mussten wir einen **Vortrag** mit [Demo](https://github.com/bztfinformatik/lernportfolio-21r8390-php/tree/main/Aufgaben/004_MVC-Example) erstellen, mit welcher wir den Betriebsinformatikern das Design Pattern erklären. Meine Aufgabe war die Demo, da ich bereits einen Entwurf hatte.

Wie das Pattern konzipiert ist lernten wir im **Selbststudium** auf YouTube. Wir bekamen Zeit, um **Videos** zu schauen und uns Notizen dazu zu machen. In der Lektion schrieben wir die einzelnen Folien der Präsentation auf und teilten diese zu. Im Verlauf der Woche sprachen wir uns genauer ab und schusterten eine Präsentation zusammen.

Die Grundkonzepte für die Trennung von Code und UI habe ich bereits im Betrieb genauer untersucht. Dort verwenden wir jedoch **Model-View-ViewModel** ([MVVM](https://www.educba.com/what-is-mvvm/)), was vergleichbar aber präferierter von Microsoft ist. Neu war mir, wie das Konzept am besten in PHP umgesetzt wird, was ich beim erstellen der Demo lernte.

!!! example "Merksatz:"

    - MVC hilft die Businesslogik und Benutzeroberfläche unabhängig zu entwickeln.

Mir ist aufgefallen, dass Design Patterns beim Strukturieren vom Code behilflich sind und durchaus ihre **Existenz** berechtigt ist. Wenn man sie als Richtwert anwendet und nur das beste herauspickt, dann bekommt eine einfache und übersichtliche Lösung. Zusätzlich habe ich gemerkt, dass Patterns oft auch in einander verlaufen.

## Objekt Orientierte Programmierung

PHP war anfänglich eine funktionale Programmiersprache. Sie haben jedoch die **Objekt Orientierung** eingeführt, um die Entwicklung zu vereinfachen. In der heutigen Lektion lernten wir die Grundlagen von [OOP](../PHP/OOP.md) in PHP, welche nicht sehr unterschiedlich zu anderen Sprachen sind. Wir schauten uns die **Klassen** und **Objekte** an und lernten über die **Konstruktor** und **Methoden**.

Für die Erstellung der [Dokumentation](../PHP/OOP.md) nutzte ich meine eigenes Vorwissen aus den vorherigen Modulen und ÜKs. Ich schrieb die Grundlagen auf und recherchierte im Internet, um die Informationen zu vervollständigen. Die **Klassen** und **Objekte** sind mir bereits bekannt, da ich sie bereits in Java und C# verwendet habe. Die **Konstruktoren** und **Methoden** sind mir neu, da sie einen anderen Syntax verwenden.

Beim **Schreiben** habe ich gelernt wie Klassen aufgebaut sind und OOP umgesetzt wurde. Dies war neu für mich, da [Überladen](../PHP/OOP.md#uberladen) und [Überschreiben](../PHP/OOP.md#uberschreiben) von Methoden nicht gleich funktioniert wie in Java. Alle anderen **Konzepte** sind mir bekannt und ich konnte sie in PHP anwenden. Ich habe auch gelernt, dass PHP eine **Mischung** aus funktionalem und objektorientiertem Programmieren ist.

!!! example "Merksatz:"

    - Klassen sind die Grundlage für Objekte.
    - Objekte sind Instanzen einer Klasse.
    - Konstruktoren sind Methoden, welche beim erstellen eines Objektes ausgeführt werden.
    - Methoden sind Funktionen, welche in einer Klasse definiert sind.

Mir ist aufgefallen, dass die Objekt Orientierung in PHP nicht so stark **ausgeprägt** ist, wie in anderen Sprachen. PHP gibt sich als OOP-Sprache aus, ist jedoch eine Mischung aus funktionalem und objektorientiertem Programmieren. Die Konzepte sind jedoch sehr ähnlich und können meistens problemlos angewendet werden. Leider sind nicht alle Konzepte gleich, wie zum **Beispiel** das Überladen von Methoden.
