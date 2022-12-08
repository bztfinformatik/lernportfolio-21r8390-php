---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 14. Woche <span style="float:right">01.12.2022</span>

???+ abstract "Zusammenfassung"

    - [Sessions](#sessions)
    - [Cookies](#cookies)

## Sessions

Im Unterricht schauten wir uns an was [Sessions](../PHP/SessionCookie/Sessions.md) sind und wie sie sich mit [Cookies](../PHP/SessionCookie/Cookies.md) **unterschieden**. Den Unterschied zwischen den beiden zu kennen ist wichtig, da sie fundamental eine andere **Funktionsweise** besitzen. In einer Dokumentation schrieb ich mir alle wichtigen Informationen auf, welche ich für die Reflexion benötige.

Auf [PHP-Einfach](https://www.php-einfach.de/php-tutorial/php-sessions/) lasen wir uns die Dokumentation zu Sessions durch. Dort wurde uns erklärt, wie wir Sessions in PHP verwenden können. Wir haben uns die Dokumentation durchgelesen und die wichtigsten Punkte **zusammengefasst**. Herr Inauen zeigte uns in einer Vorlage wie man eine Session erstellt.

Das Sessions und Cookies nicht dasselbe sind wusste ich. Jedoch war mir die Anwendung neu. Ich wusste, dass sie auf dem Server gespeichert werden und dass sie eine **Identifikation** ermöglichen. Jedoch wusste ich nicht, dass sie **verschlüsselt** werden können. Das ist ein wichtiger Punkt, da so die Daten **geschützt** sind.

!!! example "Merksatz:"

    -   Sessions & Cookies sind nicht dasselbe
    -   Sessions sind eine Möglichkeit, um Daten zwischen mehreren Seitenaufrufen zu speichern.
    -   Sessions werden in der `$_SESSION`-Variable gespeichert.
    -   Sessions werden mit der Funktion `session_start()` gestartet.
    -   Sessions werden mit der Funktion `session_destroy()` beendet.

Mir ist aufgefallen, dass ich mich mit **Sessions** noch nicht richtig beschäftigt habe. Ich habe mich mit **Cookies** beschäftigt, jedoch nicht mit Sessions. Ich werde mir Sessions noch genauer anschauen und mich mit der Anwendung **auseinandersetzen**.

## Cookies

Zum Thema [Cookies](../PHP/SessionCookie/Cookies.md) haben wir während den Lektionen nicht sehr viel gemacht. Wir unterhielten uns nur über die Anwendung und das Sessions Cookies benutzen. Als Hausaufgabe mussten wir uns die Dokumentation zu Cookies durchlesen und die wichtigsten Punkte **zusammenfassen**. Zudem mussten wir eine Applikation schreiben, welche einzigartige Benutzer identifiziert. Um auch über Sessions hinweg diese zu identifizieren, mussten wir Cookies verwenden.

Als **Unterlagen** bekamen wir die Dokumentation von [PHP-Einfach](https://www.php-einfach.de/php-tutorial/cookies/). Diese waren mir jedoch zu oberflächlich, weswegen ich mir die [MSDN-Dokumentation](https://developer.mozilla.org/en-US/docs/Web/HTTP/Cookies) zu Cookies durchlas. Dort wurde mir erklärt, wie ich Cookies erstellen kann und wie ich sie **verwenden** kann. Zudem wurde mir erklärt, wie ich Cookies **löschen** kann.

Durch die Dokumentation lernte ich, dass Cookies über das setzten der **Lebenszeit** gelöscht werden können. Zudem lernte ich, dass sie über den Header `Set-Cookie` gesetzt werden. Ich dachte zuvor, dass sie über JavaScript gesetzt werden müssen. Ich habe bereits Mal einen Vortrag über Cookies gehalten, was mir einen grossen **Vorteil** verschaffte.

!!! example "Merksatz:"

    -   Cookies sind kleine **Textdateien**, die von einer Webseite auf dem Computer des Benutzers gespeichert werden.
    -   Cookies werden mit der Funktion `setcookie()` erstellt.
    -   Cookies werden mit der Funktion `$_COOKIE` ausgelesen.
    -   Cookies werden mit der Funktion `setcookie()` gelöscht.
    -   Cookies werden über HTTP-Header gesendet.

Durch das Schreiben der **Zusammenfassung** merkte ich, dass ich bereits ein grosses Basiswissen erlangte und so schnell mich in neue Inhalte einarbeiten kann. Zudem ist es meist einfacher als man denkt, wenn man einfach beginnt und schaut wie es sich entwickelt.
