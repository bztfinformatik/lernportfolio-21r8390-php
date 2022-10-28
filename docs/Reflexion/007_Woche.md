---
tags:
    - Reflexion
hide:
    - toc
---

# 7. Woche <span style="float:right">29.09.2022</span>

???+ tldr "Zusammenfassung"

    -   [Twig Allgemein](#twig-allgemein)
    -   [Twig Design](#twig-auftrag-design)
    -   [Twig Logik](#twig-auftrag-logik)

## Twig Allgemein

Unser selbst programmiertes Framework sollte mithilfe einer **Template Engine** ausgestattet werden. Diese sollte Repetitive Aufgaben ablösen und das Bauen von Komponenten erlauben. Wir haben uns für [Twig](../PHP/Twig/%C3%9Cbersicht.md) entschieden, da es eine sehr gute Dokumentation hat und es sehr einfach ist, eigene Funktionen zu erstellen. Wir schauten und den Nutzen und [Anwendungsfälle](../PHP/Twig/%C3%9Cbersicht.md#Problemlösung) an. Um Twig überhaupt benutzen zu können schauten wir und auch den [Installationsprozess](../PHP/Twig/Installation.md) an, welcher mithilfe von **Composer** und Docker sehr einfach ist.

Im Unterricht schauten wir uns anhand eines [Beispiels](https://github.com/bztfinformatik/lernportfolio-21r8390-php/tree/main/Aufgaben/006_MVC_TWIG) an, wie Twig angewendet wird. In diesem wurde der **Umgang** mit Komponenten und einzelne Funktionen gezeigt. Mir persönlich war dies nicht genügend ausführlich, weswegen ich zu Hause die [Twig Dokumentation](https://twig.symfony.com/doc/3.x/) durchgegangen bin. Dabei habe ich alle wichtigen Funktionen und **Konzepte** verstanden und konnte diese auch anwenden. Meine gewonnenen Erkenntnisse hielt ich in der [Dokumentation](../PHP/Twig/Design.md) fest.

Ich lernte was eine Template Engine ist und was für Vorteile sie mit sich bringt. Nun weiss ich, dass es möglich ist wiederholende UI-Tätigkeiten zu automatisieren und Komponenten daraus zu erstellen. Die **Installation** und **Anwendung** von Twig konnte ich in einem Beispielprojekt nachvollziehen. Das ganze Thema war für mich neu, was mir sehr viel Spass bereitet hat.

!!! example "Merksatz:"

    -  Eine Template Engine erleichtert das Erstellen von Komponenten und das Wiederverwenden von Code.
    -  Twig ist eine Template Engine, welche es ermöglicht, HTML zu generieren.

Nächstes Mal, wenn ich ein Projekt mit PHP starte, welches ein UI benötigt, werde ich Twig verwenden, damit ich zuvor erstellte Komponenten **wiederverwenden** kann. Die Installation von Twig war mühsam, da die Dokumentation von Composer sehr knapp beschrieben ist. Zudem gab es keine richtige Suche oder Output, welcher ich als Anhaltspunkt benutzen konnte. Ich war froh, dass ich ein Projekt hatte, welches bereits mit Twig ausgestattet war. Die Handhabung von Twig hat mich begeistert, da es einfach ist.

## Twig-Auftrag (Design)

Wie bereits angemerkt haben wir Twig kennengelernt und damit ein UI gebaut. Die Aufgabe war es, dass wir dieses Projekt genauer anschauen und den **Aufbau** verstehen, damit wir wissen wo Änderungen benötigt sind, um ein HTML-Element zu verändern.

Die [Dokumentation](../PHP/Twig/Design.md) von Twig ist sehr ausführlich und für das schnelle **Nachlesen** nicht geeignet. Aus diesem Grund schrieb ich mir eine eigene Dokumentation. Darin beschrieb ich wie Bereiche überschrieben werden können, Überprüfungen funktionieren und Schleifen definiert sind.

Durch die Kombination der Information aus dem Unterricht und der praktischen Anwendung konnte ich Twig sehr gut verstehen und anwenden. Das selbstständige **Nachforschen** half mir beim verstehen, damit ich nun ein UI mit Twig bauen kann, welches nach dem [DRY-Prinzip](https://medium.com/code-thoughts/dont-repeat-yourself-caa413910753) aufgebaut werden.

!!! example "Merksatz:"

    - Eine bestehende Dokumentation in eigene Worte zu übersetzen hilft beim Verstehen und schnelleren Navigation.
    - Dokumentationen sind nicht immer für das schnelle Nachlesen geeignet.

Mir ist aufgefallen, dass manchmal **weniger Informationen** mehr ist. Wenn ich eine Dokumentation lese, möchte ich nicht alles verstehen, sondern nur das, was ich benötige. Wenn ich selbst etwas schreibe, dann neige ich dazu möglichst viele Informationen zur Verfügung zu stellen und auch auf **Sonderfälle** einzugehen. Meist ist aber ein [TLDR](https://www.urbandictionary.com/define.php?term=tl%3Bdr) besser.

## Twig-Auftrag (Logik)

Der zweite Auftrag war es, die Logik von Twig zu verstehen. Dazu mussten wir das Beispielprojekt aus dem Unterricht analysieren und die Logik verstehen. Anschliessend sollten wir es mit einer eigenen Logik erweitern, welch ein **Dropdown-Menü** enthält. Das Dropdown sollte wiederverwendbar sein und die Daten aus dem [Controller](../PHP/Twig/Logik.md) beziehen.

In der Twig Dokumentation suchte ich nach einer Funktion, welche **Dropdown** erstellt. Leider war ich dabei erfolglos. Dafür fand ich aber [Makros](https://twig.symfony.com/doc/3.x/tags/macro.html), welche meine Erwartungen erfüllten. Mit diesen konnte ich ein [Dropdown](../PHP/Twig/Logik.md#dropdown) erstellen, welches die Daten aus dem Controller bezieht. Das Dropdown ist wiederverwendbar und kann in jedem **Template** verwendet werden. Das Dropdown selbst ist sehr einfach gehalten. Es enthält nur die Logik, welche für ein Dropdown benötigt wird. Die Logik für die Daten, welche in das Dropdown geladen werden, ist in einem separaten Controller. Ein Dropdown alleine ist nicht sehr nützlich, weswegen ich es mit einem [Formular](../PHP/Twig/Logik.md#formular) kombinierte.

Im **Formular** habe ich gelernt wie Daten in Twig dargestellt und **Escaped** werden, damit [XSS](../PHP/Appendix/Sicherheit.md) verhindert wird. Das Gespür für den Umgang mit Twig habe ich sehr schnell bekommen. Ich kann nun Komponenten einbinden und selbst Funktionen mithilfe von Makros programmieren. Das Dropdown ist ein Beispiel dafür.

!!! example "Merksatz:"

    - Twig ist für das schnelle Erstellen von Komponenten geeignet, jedoch nicht für das Erstellen von komplexen Funktionen und **Sicherheitsmechanismen**.
    - Makros erlauben es eigene Funktionen zu erstellen, welche in Twig verwendet werden können.
    - Gut strukturierter Code lässt sich aufteilen und wiederverwenden.

Mit Twig konnte ich mich im Grunde anfreunden. Ob ich es endgültig in meinem **Repertoire** aufnehme, wird sich zeigen. Ich bin mir aber sicher, dass ich Twig in Zukunft öfters verwenden werde, da es für Schulprojekte sehr einfach ist. Mir fehlen die [Sicherheitsaspekte](https://symfony.com/doc/current/reference/twig_reference.html#csrf-token) und [Quality-Of-Life](https://medium.com/minimalist-brain/the-best-predictor-of-longevity-health-and-quality-of-life-afa6716d611f) Features, welche ich anderen Frameworks kenne.
