---
tags:
    - Reflexion
hide:
    - toc
---

# 3. Woche <span style="float:right">01.09.2022</span>

???+ tldr "Zusammenfassung"

    -   [Datentypen](#datentypen)
    -   [Vergleiche](#vergleiche)
    -   [Schleifen](#schleifen)
    -   [Formular](#formular)

## Datentypen

Es ist essentiell, dass man die [Datentypen](../PHP/Appendix/Datentypen.md) eine Programmiersprache kennt, damit man das richtige Werkzeug für den Anwendungsfall verwendet. Aus diesem Grund schauten wir in dieser Woche die Datentypen an. Für die Datentypen erstellte ich eine Tabelle mit einer kurzen Beschreibung. Wie Typen [konvertiert](../PHP/Appendix/Datentypen.md#typen-konvertieren) sind und wie man dieses Verhalten unterbindet dokumentierte ich auch.

Im Unterricht schauten wir uns eine Präsentation über die Datentypen an. Aus dieser erstellte ich die **Tabelle**. Im Internet sammelte ich **weiteres Wissen** um noch mehr Informationen zu den Datentypen zu erhalten. Datentypen waren nur eine **beiläufiges** Thema, weswegen es auch nur im Appendix auftaucht.

Ich habe gelernt, dass PHP auch **Typisierung** erlaubt. Das ist für mich neu, da ich bisher nur den Typ angegeben habe, dieser jedoch nicht überprüft wurde. Ich werde in Zukunft Typisierung verwenden, da es mir hilft, Fehler zu vermeiden. Zudem ist es für ausenstehende Personen leichter zu verstehen, was die Funktionen machen und benötigen.

!!! example "Merksatz:"

    -  Das überprüfen von Typen muss explizit über `declare(strict_types=1);` aktiviert werden.
    -  Datenstrukturen haben unterschiedliche Anwendungsfälle, in welchen sie Vorteilhaft verwendet werden können.

Wenn wir im Betrieb keine Typisierung verwenden würden, dann gäbe es ein **Chaos**, da nicht klar ist was die Methoden machen und zurückgeben. Zudem würde es zu Fehlern kommen, da die falschen Datentypen übergeben werden. Genau aus diesem Grund hatten wir im letzten Semester das Modul `411`, in welchem wir **Datenstrukturen** anschauten. Dort lernten wir, was für eine Struktur für welchen Anwendungsfall am besten geeignet ist. Dieses Wissen kann ich nun in PHP anwenden.

## Vergleiche

In PHP gibt es verschiedene [Vergleichsoperatoren](../PHP/Aufgaben/Vergleiche.md). Dabei unterscheidet man auch zwischen **logischen Operatoren**. Mithilfe dieser kann der Fluss eines Programmes gezielt gesteuert werden. Dadurch können Codeblöcke nur durch das zutreffen einer **Bedingung** ausgeführt werden. Dazu schrieb ich mir die Operatoren mit Beispielen auf. Ausserdem dokumentierte ich die verschiedenen Statements.

Vergleiche mussten wir im Selbststudium als **Hausaufgabe** anschauen. Dazu verwendete ich mehrere Internetseiten aus welchen ich eine Zusammenfassung erstellte. Dabei war **W3Schools** mit Abstand am hilfreichsten, da dort bereits Beispiele gegeben waren. Ausserdem konnte ich dort die Vergleiche mit einem interaktiven Editor testen. Die anderen Seiten waren eher für die Theorie und die Erklärung der Vergleiche.

An **Statements** kann man schwer etwas Ändern, weswegen auch diese in PHP gleich sind, wie in anderen Sprachen. Aus diesem Grund war es nichts neues für mich. Die zwei unterschiedlichen [Gleichheitsoperatoren](../PHP/Aufgaben/Vergleiche.md#unterschied--und) waren für mich neu. Ich habe gelernt, dass `==` nur den Wert vergleicht und `===` den Wert und den Typ. Das ist für mich wichtig, da ich nun weiss, dass ich bei der Überprüfung von Variablen den Typ mit **berücksichtigen** muss.

!!! example "Merksatz:"

    - Für Wert vergleiche wird `==` verwendet, während `===` für Wert und Typ verwendet wird.
    - Logische Operatoren verknüpfen mehrere Vergleiche miteinander.
    - Mehrere `If`-Statements können gegebenen Falls mit `else if` oder `switch` vereinfacht werden.

Aufgefallen ist mir, dass PHP für die Zeichen (`&&`) auch eine **schriftliche Variante** (`and`) hat. Das ist für mich neu, da ich bisher nur die Zeichen verwendet habe. Schriftlich ist für das lesen einfacher, jedoch **ungewöhnlicher**. Auch gibt es `XOR` was ich bisher noch in keiner Sprache gesehen habe.

## Schleifen

[Schleifen](../PHP/Aufgaben/Schleifen.md) werden verwendet um Code zu **wiederholen**. In PHP gibt es verschiedene Schleifen, welche alle ihre eigenen Vor- und Nachteile haben. In Folge dessen schaute ich mir die Schleifen genauer an, indem ich den **Syntax** aufschrieb und die Unterschiede aufzeigte.

Die Schleifen sind in PHP gleich wie in anderen **Sprachen**. Gleich wie Vergleiche habe ich dieses Thema selbstständig erarbeitet. Dabei war [GitHub Copilot](https://github.com/features/copilot/) bei der Erstellung der Beispiele sehr hilfreich. Automatisch wurden die Beispiele erstellt und ich musste nur noch die Schleifen anpassen. Beim verwenden eines solchen Tools ist es wichtig, dass man das **Prinzip** versteht, da man ansonsten nicht weiss, ob die Ausgabe qualitativ ist.

Aus dem Grund, dass das ganze Thema fast **identisch** zu anderen Sprachen ist, habe ich praktisch nichts neues gelernt. Die Arten und Anwendungsfälle kannte ich bereits. Ich persönlich finde, dass ein **Kurztest** zu diesem Thema sinnvoller gewesen wäre als eine Dokumentation.

!!! example "Merksatz:"

    - `for`-Schleifen werden verwendet, wenn die Anzahl der Wiederholungen bekannt ist.
    - Für eine Sammlung von Elementen wird vorzugsweise eine `foreach`-Schleife verwendet.

Bemerkt habe ich, dass Schleifen grundsätzlich in allen Programmiersprachen gleich sind. Das ist für mich wichtig, da ich nun weiss, dass grundlegende **Konzepte** in allen Sprachen gleich sind. Der Vorteil davon ist, dass ich nun eine neue **Hochschulsprache** lernen könnte und weiss was für Schleifen existieren.

## Formular

Letzte Woche schauten wir und die **HTTP-Parameter** an. Um den Umgang damit zu üben, schrieb ich mir ein [Formular](../PHP/Aufgaben/Formular.md) auf. Dabei verwendete ich die [GET- und POST-Parameter](../PHP/Aufgaben/HTTP-Parameter.md). Da bei Formularen auf Sicherheit geachtet werden muss erstellte ich eine Zusammenfassung von **Sicherheitslücken**. Diese sind jedoch noch in Arbeit und werden in den nächsten Wochen fertiggestellt. Wichtig war mir jedoch, dass `Cross-Site-Scripting` nicht über mein Formular möglich ist, was ich auch erfolgreich umsetzte.

Bevor ich mit dem **Auftrag** begann, habe ich mir mögliche [Sicherheitsprobleme](../PHP/Appendix/Sicherheit.md) aufgeschrieben und mich darüber informiert. Sobald ich wusste auf was ich achten muss wendete ich mich dem Formular. Von Herr Inauen hatten wir ein **Beispiel** bekommen, welches man umsetzen kann. Ich entschied mich jedoch ein etwas ausführlicheres zu machen, welche die gleichen Eingabefelder verwendet.

Letzte Woche habe ich bereits HTTP-Parameter angeschaut und gelernt wie man mit diesen umgeht. Aus diesem Grund sind keine unerwarteten Überraschungen aufgetaucht. Neu war mir die **Unterteilung** von Formularen mit HTML und PHP getrennt oder zusammen. Ich persönlich finde, dass zusammen schöner ist, da es eine Komponente bildet, welche **unabhängig** von anderen Komponenten ist. Formulare werden in einer Webapplikation ständig verwendet. Deswegen ist es wichtig, dass man diese richtig beherrscht.

!!! example "Merksatz:"

    - Das HTML und PHP von Formularen kann unterteilt oder zusammengenommen werden.
    - Formulare sollten mit einem `CSRF` Token geschützt werden, um sicherzustellen, dass der Benutzer die Anfrage gesendet hat.
    - Eingaben sollten in HTML Charakter umgewandelt werden, um `XSS` zu verhindern.

Als **Fazit** würde ich sagen, dass ich das Thema Formulare bereits gut beherrschte. Um es für mich selbst spannender zu machen vordere ich mich heraus, wie mit den Sicherheitsfeatures. Diese zu verstehen und auch zu implementieren ist für mich ein **neues** Thema. Ich bin gespannt wie es weitergeht.
