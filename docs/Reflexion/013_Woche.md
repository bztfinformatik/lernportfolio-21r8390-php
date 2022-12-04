---
tags:
    - Reflexion
hide:
    - toc
---

# 13. Woche <span style="float:right">24.11.2022</span>

???+ abstract "Zusammenfassung"

    - [Download](#download)
    - [Email](#email)

## Download

Ein wichtiger **Bestandteil** meines Projektes ist, dass aus der Konfiguration eine **Vorlage** generiert werden kann. Aus diesem Grund habe ich diese Woche mich an die Umsetzung des **Downloads** gewagt. Dazu musste ich zum einen das Projekt aus der Datenbank laden und zum anderen die Vorlage generieren. Zum Schluss sollte ein **ZIP-Archiv** mit allen Dateien erstellt werden.

Mit dem aufsetzen einer MkDocs-Dokumentation hatte ich bereits **Erfahrung**, weswegen ich zuerst eine **Mustervorlage** erstellte. Diese hatte bereits Texte und Konfigurationen darin. Die Werte ersetzte ich dann durch **Platzhalter**, welche konditional ersetzt werden. Damit alle Methoden an einem zentralen Punkt zu finden sind erstellte ich einen **Service**. Dieser Service enthält alle Methoden, welche für den Download benötigt werden. Dieser Kopiert alle benötigten Dateien in ein **temporäres Verzeichnis** und ersetzt die Platzhalter. Somit habe ich eigentlich eine eigene Template Engine geschrieben. Zum Abschluss wird das Verzeichnis als ZIP-Archiv komprimiert und zum **Download** angeboten.

Dabei habe ich gelernt, wie man strukturiert eine **Aufgabe** löst und so Schritt für Schritt eine Anforderung erfüllt. Zudem habe ich gelernt, dass **Design Patterns** nicht nur für die Programmierung wichtig sind, sondern auch für die Strukturierung von Code.

!!! example "Merksatz:"

    -  **Design Patterns** sind nicht nur für die Programmierung wichtig, sondern auch für die Strukturierung von Code.
    -  Services sind isoliert und enthalten nur die Methoden, welche für die Aufgabe benötigt werden.

Das **Schwierigste** an der ganzen Sache war, dass ZIP zu erstellen. Im Internet fand man dazu fast keine Lösung, die ein Verzeichnis zippt. **Rekursiv** musste ich mir selbst eine Lösung basteln, welche leider nicht immer funktioniert. Auch wenn der Service nicht kompliziert ist dauerte das Schreiben **mehrere Tage** und musste mehrmals überarbeitet werden.

## Email

Wenn der **Status** eines Projektes geändert wird, dann sollte der Benutzer darüber **Informiert** werden, damit er weiss was er verbessern muss oder das Projekt zum Download bereit steht. Für die **Emails** kann PHP verwendet werden, was über [SMTP Mails](https://www.php-einfach.de/php-tutorial/php-email/) versendet. Ich fand dies Lösung jedoch unschön und unsicher, weswegen ich mich für SendGrid entschied.

[SendGrid](https://sendgrid.com/) ist ein **Email Service Provider**, welcher eine **API** anbietet. Diese API kann verwendet werden, um Emails zu versenden. Dazu muss nur ein [Composer Packet](https://github.com/sendgrid/sendgrid-php) installiert werden. Im Web UI kann eine **Vorlage** mit [Platzhaltern](https://docs.sendgrid.com/ui/sending-email/how-to-send-an-email-with-dynamic-templates) erstellt werden. Diese Vorlage kann dann mit der API verwendet werden. Die API ist sehr einfach und kann mit wenigen Zeilen Code verwendet werden. In meinem **Betrieb** verwenden wir diese Lösung bereits, weswegen ich hier einen doppelten **Lerneffekt** hatte.

Auf für diese Aufgabe erstellte ich einen **Service**, welche die Daten für die Email zusammenstellt und diese an die **API** sendet. Dabei musste ich beachten, dass **Fehler** gut abgefangen werden, da ich keine Kontrolle über die API habe.

Ich habe gelernt, dass APIs sehr einfach zu bedien sind, wenn die **Dokumentation** ausführlich ist. Zudem lernte ich wie man Emails mittels **SendGrid** versendet. Dies habe ich zuvor noch nie gemacht, was ich nun aber beherrsche.

!!! example "Merksatz:"

    -  APIs sind sehr einfach zu bedienen, wenn die Dokumentation ausführlich ist.
    -  SendGrid ist ein Email Service Provider, welcher eine API anbietet.

Viele andere Anbieter verlangen ein **Konto** und eine **Kreditkarte**. SendGrid ist kostenlos und bietet eine **API** an, die bis zu 100 Anfragen pro Tag erlaubt. Dies ist für mich ein **Vorteil** gegenüber anderen Anbietern. Zudem ist die API sehr einfach zu bedienen und die Dokumentation ist ausführlich.
