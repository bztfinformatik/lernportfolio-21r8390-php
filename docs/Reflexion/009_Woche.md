---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 9. Woche <span style="float:right">27.10.2022</span>

???+ abstract "Zusammenfassung"

    - [2. Abgabe Besprochen](#2-abgabe-besprochen)
    - [Validierung](#validierung)
    - [UI Mockup](#ui-mockup)

## 2. Abgabe Besprochen

Letzte Woche haben wir zwar gerade erst die [LB1](../LB1/Uebersicht.md) besprochen, jedoch ist die **zweite Abgabe** bereits in der nächsten Woche. Daher haben wir uns entschieden, die zweite Abgabe bereits zu besprechen. Dort müssen wir mit Mock-Daten bereits das UI und die Grundfunktionalitäten umsetzen. Die Datenbank wird erst in der dritten Abgabe benötigt.

Wie das letzte Mal gab es **diverse Fragen**, die wir besprochen haben. Zudem gab es wieder **PDF**, welche die Anforderungen beschrieben. Dies habe ich mir genau durchgelesen und bereits im Unterricht fragen gestellt.

Ich habe gelernt, dass die erste Umsetzung ohne eine **Datenbank** viel einfacher ist, da nur auf das Verhalten geachtet werden muss. Bisher habe ich immer gleichzeitig die Daten und das UI umgesetzt. Daher ist es für mich neu, dass ich erst Mal nur das UI umsetzen muss. Der Vorteil davon ist, dass ich so bereits **Mocks** habe, welche ich für Tests wiederverwenden kann.

!!! example "Merksatz:"

    -  Mocks sind Daten, welche nur für Tests verwendet werden. Sie sind nicht für die Produktion gedacht.

Mir ist aufgefallen, dass in unserer Klasse sehr viel **Wissensdifferenz** besteht. Für die einen Ist eine Aufgabe zu schwer, für die anderen zu leicht. Dasher ist das setzen von Anforderungen sehr schwierig und nicht immer für alle Verständlich.

## Validierung

Das wichtigste wenn man ein **Formular** hat ist, dass die Daten darin validiert werden. Dies müssen wir auch bei der 2. Abgabe umsetzten, weswegen wir uns mit dem Thema [Validierung](../PHP/Framework/Validation.md) beschäftigt haben. Es braucht immer eine **serverseitige** Validation, da der Client sie ansonsten umgehen kann. Da PHP nur auf dem Server läuft ist die Validierung etwas aufwändiger.

Wie immer, wenn wir etwas neues Beginnen hat Herr Inauen uns ein **Beispielprojekt** erstellt. In diesem wurde bereits die Validation mit Fehlermeldungen umgesetzt. Somit mussten wir nur den **Aufbau** und Art der Validierung verstehen. Dies war für mich nicht schwer, da ich [HTTP-Methoden](https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods) kenne und weiss welche für was zuständig ist.

Mit dem Thema **Validierung** habe ich mich zuvor schon sehr intensiv beschäftigt, weswegen ich dabei nicht sehr viel lernte. Wie die aber in PHP aussieht und was für **Tricks** es gibt kannte ich nicht. Daher war es für mich sehr interessant. In meinem Projekt werde ich die Validierung auch so verbauen.

!!! example "Merksatz:"

    - GET ist für das Laden des Formulars zuständig.
    - POST validiert das Formular und gibt die Fehlermeldungen zurück.
    - Es wird immer eine serverseitige Validierung benötigt.

Von [Blazor](https://blazor-university.com/forms/validation/) kenne ich die Validierung bereits. Mir ist jedoch aufgefallen, dass erst beim Senden die **Fehlermeldungen** angezeigt werden, was ich überhaupt nicht toll finde. So muss immer zuerst auf den Button geklickt werden, um zu sehen, ob alles korrekt ist. Daher habe ich mich nach einer anderen **Lösung** umgeschaut. Bin aber bisher noch nicht fündig geworden.

## UI Mockup

Für das UI des Projektes mussten wir eine Skizze zeichnen. Diese sollte aufzeigen was für **Elemente** wir verwenden und wie diese **zusammenhängen**. Im Internet suchte ich nach [Farbpaletten](../LB1/Architekturkonzept/Mockup.md#farben), anhand welchen ich mein UI gestalten wollte. Dabei fand ich eine [Farbpalette](https://niceillustrations.com/free-illustrations/?_sft_styles=mint) welche mir sehr gut gefiel. Diese habe ich dann in meinem UI verwendet. Das Mockup versehrte ich mit Logik, damit es wie ein richtiger Prototyp benutzt werden kann.

Die Mockups wurden mit [Figma](https://www.figma.com/) erstellt. Figma ist eine Webanwendung, die es ermöglicht, gemeinsam an einem Projekt zu arbeiten. Es ist kostenlos und auf allen Geräten benutzt werden. Die Mockups sind öffentlich und können [hier](https://www.figma.com/file/bm3B3SmrKILNZ37ZRtkQEe/M133?node-id=0%3A1) eingesehen werden. Die Mockups sind in drei Bereiche unterteilt: **Start**, **User** und **Admin**. Der Startbereich ist die Startseite der Website, auf welcher die Anmeldung passiert. Der Userbereich ist die Seite, die der User sieht, wenn er sich angemeldet hat. Dort kann er seine Vorlagen herunterladen und Neue erstellen. Der Adminbereich ist die Seite, die nur die Administratoren sehen. Dort können sie die Anträge der User bestätigen oder ablehnen.

Figma habe ich bisher für einige Mockups verwendet. Dieses Mal habe ich aber Logik zur **Navigation** hinzugefügt, was das Ganze noch etwas komplexer machte. Wenn ich von Anfang an gewusst hätte, dass das UI so aufwendig wird, dann hätte ich minimaler gearbeitet. In meinem **Berufsleben** kann ich das Wissen sehr gut benutzen, da ich öfters Mockups erstellen muss.

!!! example "Merksatz:"

    - Figma ist eine Webanwendung, die es ermöglicht, gemeinsam an einem Projekt zu arbeiten.
    - Figma erlaubt es ein Mockup mit Logik zu versehen.

Ich merke wie mein Wissen immer grösser wird und ich immer mehr **Fähigkeiten** erlerne. Dies ist für mich sehr wichtig, da ich so effizienter werde und somit grössere Projekte umsetzen kann. Ich bin sehr froh, dass ich die Möglichkeit habe, mich in diesem Bereich **weiterzuentwickeln**.
