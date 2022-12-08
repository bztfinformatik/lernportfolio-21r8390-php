---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 11. Woche <span style="float:right">10.11.2022</span>

???+ abstract "Zusammenfassung"

    -   [User Seiten](#user-seiten)
        -   Sign In
        -   Sign Up
        -   Profile
    -   [Projekt](#projekt)
        -   Erstellen
        -   Bearbeiten
        -   Dashboard
    -   [Regex](#regex)

## User Seiten

In dieser Woche habe ich die **User Seiten** erstellt, damit man sich anmelden oder registrieren kann. Nach der Registration kommt ein Popup, welches darauf hinweist, dass die **Email** verifiziert werden muss. Das Email wird leider noch nicht versendet. Bei der Anmeldung kann man sich mit einem **Mock-Benutzer** anmelden. Die Daten werden dann in die Session gespeichert. Wenn die Applikation ohne eine gültige Anmeldung gemacht wurde, dann wird man auf die Login-Seite **weitergeleitet**, damit man sich anmelden kann.

Damit die **Anmeldung** gespeichert bleibt habe ich die Session-Handling-Wrapper verbaut. Dazu habe ich im Internet nach unzähligen Tutorials gesucht und diese dann in meinem Projekt eingebaut. Das die Daten immer aktuell sind war durch die nicht vorhandene Datenbank eine **Herausforderung**.

Ich habe gelernt wie man Variablen über Abfragen hinweg in die [Session](https://www.w3schools.com/php/php_sessions.asp) speichert.

!!! example "Merksatz:"

    -  Die Anmeldung muss in einer `Session` gespeichert werden.

Für mich war das **Session Handling** das erste Mal, dass ich mit PHP gearbeitet habe. Zu verstehen wo das `session_start` stehen muss war für mich eine Herausforderung, da es keinen Sinn macht die Session immer zu starten. Als ich es dann verstanden habe, war es relativ einfach.

## Projekt

Das Projekt braucht natürlich auch eine Seite, worüber eine **Vorlage** erstellt werden kann. Dazu musste ich mir ein Konzept für die Erstellung und Bearbeitung realisieren. Es sollte ein **Prozess** geben, welcher über mehrere Seiten hinweg läuft. Dies war schwieriger als ich mir vorstellte, da ich nicht wusste wie ich die Daten zwischen den Seiten hin und her bekomme. Provisorisch habe ich mich für das visuelle ausblenden der Felder entschieden. Wirklich schön ist dies aber nicht. Sobald ich die Datenbank habe werde ich es über **Sessions** realisieren, da ich so die Daten zwischen den Seiten hin und her bekomme. Die Daten werden dann in der Session gespeichert und beim nächsten Aufruf der Seite wieder ausgelesen.

Ich habe zuerst die einzelnen Abfragen mithilfe von **Mocks** simuliert und so die einzelnen Funktionen getestet. Danach habe ich die Funktionen in die Controller eingebaut. Dabei war die Dokumentation von [Daisy UI](https://daisyui.com/) sehr hilfreich, da ich so schnell die richtigen Klassen für die Buttons und Felder gefunden habe.

Ich habe gelernt wie man mehrere **Endpunkte** miteinander verbindet und sie so zugänglich für andere Methoden macht. Mit diesem Wissen kann ich nun Werte über Abfragen hinweg speichern und so ein gutes **User-Experience** bieten. Zudem lernte ich wie ich Daten über Anfragen hinweg speichern und validieren kann.

!!! example "Merksatz:"

    -  Zuerst sollten alle Hilf-Funktionen programmiert werden, bevor der Rest umgesetzt wird.

Mir ist aufgefallen, dass ich die **Controller** nicht so gut getestet habe, wie ich es eigentlich wollte. Ich habe mich darauf konzentriert, dass die Funktionen funktionieren und nicht, dass sie auch richtig funktionieren. Im ganzen habe ich für die **Umsetzung** der Funktionen 3 Arbeitstage (`73h`) gebraucht.

## Regex

Heute haben wir in der Lektion [Regex](https://rapidapi.com/blog/regex-cheat-sheet/) angeschaut. Es wird benötigt um **Eingaben** nach einer **Struktur** zu validieren. So kann sichergestellt werden, dass ein String die richtigen Zeichenabfolgen enthält.

Im Unterricht haben wir uns angeschaut wie Regex in PHP geschrieben wird, da es in jeder Sprache anders ist. Wir schauten uns bekannte Muster an und was für Zeichen es gibt. Mithilfe von `a-zA-Z` kann man nur nach Buchstaben suchen.

Regex kenne ich schon seit meinem ersten Lehrjahr, da es für **Validierungen** ein wichtiges Werkzeug ist. Ich habe es aber noch nie in PHP verwendet, weswegen ich mich dort in die [Dokumentation](https://catswhocode.com/php-regex/) eingelesen habe. Grundsätzlich ist es aber sehr ähnlich zu anderen **Dialekten**.

!!! example "Merksatz:"

    -  Regex wird verwendet um **Eingaben** nach einer **Struktur** zu validieren.

Selbst ein gutes **Regex-Muster** zu schreiben ist sehr komplex und braucht viel Überlegungen. Viel schneller ist man da mit einer Suche im Internet oder am besten auf [StackOverflow](https://stackoverflow.com/questions/tagged/regex).
