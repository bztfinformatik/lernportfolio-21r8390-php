---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 15. Woche <span style="float:right">08.12.2022</span>

???+ abstract "Zusammenfassung"

    - [Benutzer Counter](#benutzer-counter)
    - [PHP Login](#php-login)

## Benutzer Counter

Für den [Benutzerzähler](../PHP/SessionCookie/Anwendung.md) von letzter Woche habe ich nun eine **Zusammenfassung** geschrieben, in welcher ich die wichtigsten Punkte notierte. Anhand dieser Notizen könnte nun jemand mit wenig Wissen [Sessions](../PHP/SessionCookie/Sessions.md) und [Cookies](../PHP/SessionCookie/Cookies.md) verwenden.

Für eine klare **Struktur** habe ich die Notizen in Abschnitte unterteilt und diese mit einer Überschrift versehen. Zuerst beschrieb ich den [Aufbau](../PHP/SessionCookie/Anwendung.md#aufbau) der Dateien. Als nächstes Beschrieb ich das [Programm](../PHP/SessionCookie/Anwendung.md#programm) mit kleineren Codeausschnitten. Mithilfe von **Kommentaren** habe ich die einzelnen Schritte erklärt. Zum Schluss habe ich noch einige [Kleinigkeiten](../PHP/SessionCookie/Anwendung.md#ausgabe) beschrieben, die ich nicht in den Code eingefügt habe.

Der **Benutzerzähler** ist ein einfaches Beispiel, welches zeigt, wie Sessions und Cookies miteinander verbunden werden können. Es ist sozusagen das **Hello World** Beispiel für Sessions und Cookies. Jedoch ist es nicht das einzige Beispiel. Es gibt noch viele andere Anwendungsfälle, in welchen Sessions und Cookies verwendet werden können.

!!! example "Merksatz:"

    - Kommentare sind wichtig, um den **Code** zu verstehen.
    - Zusammenfassungen helfen zur **Reflexion** und **Vertiefung** des Wissens.

Kleinere Beispiele aus dem Internet sind oft nicht ausreichend, um das Wissen zu vertiefen. Daher ist es wichtig, dass man sich die Zeit nimmt, um das Wissen zu vertiefen. Dazu gehört auch, dass die eigenen Projekte dokumentiert werden.

## PHP Login

Bei meinem Projekt habe ich bereits vor einigen Wochen die **Anmeldung** realisiert. Dabei funktionierten alle Tests ohne Probleme. Nun habe ich die Anmeldung auf einem anderen Rechner getestet und festgestellt, dass die Anmeldung nicht funktioniert. Nach einigen **Stunden** habe ich den Fehler gefunden. Der Hashwert des **Passwords** war zu lange, sodass die Verschlüsselung nicht mehr funktioniert hat. Das Ende des Passwortes wurde abgeschnitten, was dazu führte, dass das Passwort nicht richtig validiert wurde.

Ich habe den Hashwert nun auf **32 Zeichen** verkürzt und die Anmeldung funktioniert wieder. Da ich mit dieser Lösung nicht wirklich zufrieden bin habe ich mich im Internet schlau gemacht, was die Ursache davon ist. Der **Verschlüsselungsalgorithmus** hat eine maximale Länge von 72 Zeichen. Es gibt andere Algorithmen, jedoch haben diese ein ähnliches Verhalten.

Durch die **Recherche** habe ich auch herausgefunden wie die Verschlüsselungen intern funktionieren und weshalb dieses Limit existiert. Die Verschlüsselung wird durch einen **Hashwert** dargestellt. Dieser besteht aus einem Algorithmus und einem Salt. Der Salt ist ein zufällig generierter Wert, der dem Passwort vorangestellt wird. Dadurch wird das Passwort unabhängig vom Algorithmus. Der **Salt** wird bei jedem Versuch neu generiert. Der Salt wird nicht gespeichert, da er nur dazu dient, dass das Passwort unabhängig vom Algorithmus ist. Der Salt wird nur bei der Verschlüsselung verwendet. Wenn die Hashwerte übereinstimmen ist das **Passwort** korrekt.

!!! example "Merksatz:"

    - **Algorithmen** verwenden einen Salt, um das Passwort unabhängig vom Algorithmus zu machen.
    - Der Salt ist ein zufällig **generierter Wert**, der dem Passwort vorangestellt wird.

Wenn ein Passwort zu lang ist, wird es abgeschnitten. Dies halte ich für ein **Sicherheitsproblem**, da keine Warnung oder sonstiges angezeigt wird. Der Benutzer wird nicht darüber informiert, dass sein Passwort zu lang ist. Jedoch wird er **gewarnt**, wenn eine Position in einem Array nicht existiert.
