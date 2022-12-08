---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 12. Woche <span style="float:right">17.11.2022</span>

???+ abstract "Zusammenfassung"

    - [Datenbank](#datenbank)
    - [Datei Viewer](#datei-viewer)

## Datenbank

Im Unterricht haben wir angeschaut, wie die **Datenbankverbindung** mithilfe von [PDO](../Datenbank/PreparedStatements.md#was-ist-pdo) gemacht wird. Wir schauten uns [Prepared Statements](../Datenbank/PreparedStatements.md) an und was diese für Vorteile hingegen den traditionellen Abfragen hat. Zudem lernten wir wie ein **Wrapper** aufgebaut ist und was für einen **Zweck** dieser hat.

Wir haben wieder eine **Vorlage** erhalten, die wir bearbeiten mussten. Dort war bereits eine Verbindung zur Datenbank vorhanden und wir mussten verstehen was genau passiert. Dazu gab es einen **Wrapper**, namens `Database.php`, der die Verbindung zur Datenbank herstellt und die Datenbankabfragen ausführt. So konnten gewisse Abfragen vor dem Ausführen bearbeitet werden. Zudem gab es **Methoden**, welche die Abfragen erleichterten.

Dabei habe ich gelernt, wie man in PHP [SQL-Injection](../Appendix/Sicherheit.md#sql-injection) sichere Abfrage mithilfe von **Prepared Statements** ausführt. Aus dem ÜK und Tutorials kannte ich den Umgang bereits, jedoch habe ich mich noch nie tief damit beschäftigt wie die Abfragen **escaped** werden.

!!! example "Merksatz:"

    -  Prepared Statements sind SQL-Injection sichere Abfragen
    -  PDO wird zur Verbindung zu relationalen Datenbanken verwendet

Das Schreiben eines Wrappers um **PDO** fand ich eine geniale Idee, da so **wiederkehrende** Methoden vereinfacht werden konnten. Aus meiner Arbeit bin ich bereits stark auf Injections **sensibilisiert**, weswegen mir gar nicht in den Sinn kommen würde keine Prepared Statements zu verwenden.

## Datei Viewer

Der Datei Viewer, welcher die **Bearbeitung der Struktur** ermöglichen sollte, habe ich aus der letzten Abgabe in diese verschoben, da es einige Probleme mit [jsTree](https://www.jstree.com/) gab. Die Arbeit mit dem **JSON** ist schwieriger als ich dachte, da es nicht strukturiert ist. Zudem sind die Beispiele nicht komplett oder haben gar keinen Code dazu. So war es für mich sehr schwierig eine laufende **Lösung** zu bauen, da alles aus dem Kopf heraus gemacht werden musste.

Ich durchstöberte die Dokumentation und unzählige StackOverflow Fragen, bis ich herausfand was für Dateien ich benötigte. Diese konnte ich konnte ich **konditional** laden, sodass ich die Dateien nur dann laden musste, wenn sie benötigt wurden. Zudem habe ich die **CSS** und **JS** Dateien in die **Assets** verschoben, damit diese nicht mehr im **HTML** sind. Der Nachteil ist, dass jsTree auf jQuery basiert und deswegen extrem viel geladen werden muss. Ich habe es nicht geschafft die Dateien zu optimieren, es ein zu grosses Durcheinander ist.

Ich habe gelernt, dass eine **gute Dokumentation** einige Stunden Arbeit ersparen kann.

!!! example "Merksatz:"

    -  jsTree ist ein JS Plugin, welches eine Baumstruktur darstellt
    -  jsTree ist auf jQuery basiert und benötigt viel JS und CSS
    -  Eine gute Dokumentation kann viel Zeit sparen

Beim **Planen** des Projektes dachte ich, dass die Bearbeitung der Struktur ohne **Probleme** gemacht werden kann. Nun weiss ich aber, dass dies ganz und gar nicht der Fall ist. Es ist wichtig auch bei der Planung kleinere **Tests** zu machen, um sicherzustellen, dass die **Schnittstelle** kompatibel und lauffähig ist.
