---
tags:
    - Reflexion
hide:
    - toc
---

# 10. Woche <span style="float:right">03.11.2022</span>

???+ abstract "Zusammenfassung"

    -   [Struktur](#struktur)
        -   404
        -   Landing Page
        -   Klassen
    -   [ELK-Stack](#elk-stack)
        -   Monolog
        -   Kibana
        -   Einbindung
    -   [Tailwind CSS](#tailwind-css)
        -   DaisyUI
        -   Sinn und Zweck
        -   Einbindung

## Struktur

Das Projekt wurde letzte Woche fertig geplant, weswegen ich nun mit der **Umsetzung** beginnen konnte. Ich habe vor allem die Dateien organisiert und die Vorlage nach meinen Vorlieben angepasst. Danach habe ich die einfachsten Seiten umgesetzt, damit ich sehen kann, ob alles funktioniert. Die Seiten waren `404` und `Loading`. Die Seiten zu erstellen waren eigentlich nicht schwierig. Das Styling mit [Tailwind CSS](#tailwind-css) war zu beginn jedoch etwas schwierig, da ich noch nicht so viel Erfahrung mit Tailwind hatte. Die **Klassen** durften natürlich auch nicht fehlen, welche ich zur Zeit noch nicht benutze. Diese kommen vor allem in der nächsten Woche zum Einsatz.

Für die [Struktur](../LB1/Architekturkonzept/MVC-Konzept.md) aus der Planung zur Hilfe genommen. Es ist nach dem MVC-Pattern aufgebaut und hat die Ordner in Kategorien eingeteilt. Diese sind:

-   Core
-   Models
-   Controller
-   Repositories
-   View

Die Klassen aus den Models habe ich vom [PlantUML](../LB1/Architekturkonzept/MVC.puml) abgeleitet. Dazu habe ich vor allem _Copy-Paste_ die Klassennamen übernommen und in PHP-Variablen umgeschrieben.

Beim erstellen der Struktur habe ich gemerkt, dass eine gute **Planung** extrem hilfreich ist und viel Zeit spart. Dies war das erste Mal, dass ich so viel Zeit in die Planung investiert habe und ich muss sagen, dass es sich gelohnt hat. Die Konzepte hatte ich alle schon und musste sie nur noch anwenden. Dies werde ich wieder so machen.

!!! example "Merksatz:"

    -  Mit einfachen UIs anfangen und auf diesen Aufbauen ist immer die beste Lösung.
    -  PlantUML ist eine gute Hilfe für die Struktur.

Auch die beste Planung kann nicht mit Unwissenheit rechnen. Einiges war noch nicht klar, was sich später als komplizierter als gedacht herausstellte, wie z.B. die [ELK-Stack](#elk-stack) Einbindung. Dies ist aber nicht weiter schlimm, da ich es jetzt weiss und es in Zukunft besser machen kann.

## ELK-Stack

Der [ELK-Stack](https://www.elastic.co/what-is/elk-stack) ist ein **Log-Management-System**. Es besteht aus drei Teilen:

-   Elasticsearch
-   Kibana
-   Logstash

in PHP kommt dazu noch [Monolog](https://seldaek.github.io/monolog/), was die Logs erfasst und an den ELK-Stack weiterleitet. ELK ist sehr **kompliziert** und für grosse Systeme gebaut. Ich habe den Logger aufgebaut, sodass ich von PHP über eine einfache Methode eine Meldung an [Logstash](https://www.elastic.co/guide/en/logstash/current/setup-logstash.html) senden kann.

Den ELK-Stack habe ich mithilfe von [Docker](https://github.com/andybeak/monolog-elk-demo/tree/master/docker) eingebunden. Dazu habe ich `.env`-Dateien verwendet, damit die Variablen alle an einem Ort sind. Mithilfe von Verbindungen (`depends_on`) habe ich die Container miteinander verbunden und ein spezielles **Netzwerk** erstellt. Dieses Netzwerk wird von allen Containern verwendet, damit sie sich untereinander finden können. So grenzte ich die Sicherheit ein und könnte konfigurieren. dass die Container auch von aussen nicht erreichbar sind.

Ich habe gelernt wie der ELK-Stack aufgebaut ist und wie man ihn einsetzt und einrichtet. Nun weiss ich wie Logs strukturiert versendet werden können und [logging](https://bztfinformatik.github.io/lb1_doku-21r8390/Erkl%C3%A4rungen/Logging/) im allgemeinen in PHP funktioniert. Zudem lernte ich wie man **Konfigurationen** in Docker schreibt und diese an die Container übergibt.

!!! example "Merksatz:"

    -   Docker ist eine gute Möglichkeit, um den Entwicklungsstacks einzubinden ohne alles zu installieren.
    -   ELK ist sehr kompliziert und für grosse Systeme gebaut.

Mir ist aufgefallen, dass die Einrichtung von ELK-Stack ohne Vorwissen sehr kompliziert ist und ich dafür deutlich mehr Zeit einplanen hätte müssen. Im gesammten habe ich über **26 Stunden** nur für die Einrichtung benötigt. Spass machte es mir aber trotzdem.

## Tailwind CSS

[Tailwind](https://tailwindcss.com/) ist ein UI Framework, welches mithilfe von Klassen das Styling ermöglicht. Normalerweise würde man es mit [Node.js](https://nodejs.org/en/) verwenden und so ein sehr komprimiertes CSS generieren. Dieses ist dann sehr **performant** und leicht zu erweitern.

Ich habe es aber ohne Node.js verwendet, da ich es nicht installieren musste. Ich habe es einfach in den Ordner kopiert und mit einem `<link>` eingebunden. Dies hat den **Nachteil**, dass das CSS sehr gross ist und nicht komprimiert ist.

!!! example "Merksatz:"

    -   Tailwind CSS ist performant und leicht zu erweitern.
    -   Tailwind CSS ist für **grosse** Projekte mit mehreren Entwicklern gedacht.
    -   Breit gefächertes Wissen ist unglaublich hilfreich um neue Technologien zu lernen.

Dies war das erste Mal, dass ich Tailwind verwendete und bin mit dem Ergebnis sehr zufrieden. Zuvor habe ich immer [Bootstrap](https://getbootstrap.com/) benützt, was mir zu definiert war. Änderungen waren nur schwer zu erreichen. Durch mein **CSS-Vorwissen** konnte ich mich schnell einarbeiten.
