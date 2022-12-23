---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 16. Woche <span style="float:right">15.12.2022</span>

???+ abstract "Zusammenfassung"

    - [Redis](#redis)
    - [Testfälle](#testfalle)

## Redis

Redis ist eine in Memory Datenbank, welche für **Cache** und **Session** verwendet wird. Der **Vorteil** liegt darin, dass es sehr schnell ist. Die Daten werden in einem Key-Value Format gespeichert, was eine schnelle Suche ermöglicht. Ich wollte, dass die Session Daten in [Redis](https://redis.com/) gespeichert werden, damit ich eine **dezentrale Verwaltung** habe.

Im Internet suchte ich nach bestehenden Beispielen, welche mir zeigten wie der **Aufbau** sein sollte. Leider fand ich nur alte Versionen, welche nicht funktionieren oder nicht mehr aktuell sind. Ich entschied mich, die **Datenbank** von Hand aufsetzen und so sicherzustellen, dass alles funktioniert.

Beim **Aufsetzten** habe ich gelernt, dass eine aktuelle Dokumentation sehr wichtig ist. Das nächste Mal würde ich zuerst ein kleines Projekt ohne alle anderen **Abhängigkeiten** aufsetzen, um zu sehen ob es funktioniert. So könnte ich sichergehen, dass das Problem nicht an einer anderen Stelle liegt. Ich habe gelernt wie man Redis aufsetzt und mithilfe von Docker konfiguriert.

!!! example "Merksatz:"

    - Redis ist eine **In Memory** Datenbank die als Cache und Session verwendet wird.
    - Die Daten werden in einem Key-Value Format gespeichert.

Mir ist aufgefallen, dass ich mich nicht genug mit der **Dokumentation** beschäftigt habe. Ich habe mich auf die Suche nach einem Beispiel gemacht, welches mir zeigt wie ich die Datenbank aufsetze. Leider habe ich nur alte Versionen gefunden, welche nicht mehr funktionieren.

## Testfälle

In der nächsten Abgabe müssen wir **Testfälle** schreiben, welche dann durchlaufen werden. Anhand der Testfälle wird geprüft, ob die Software sich richtig verhält. Mithilfe eines Testplans könnte automatisch überprüft werden, dass alles wie erwartet läuft.

Im **Modul 226B** haben wir bereits für das Projekt ein [Testprotokoll](https://bztfinformatik.github.io/lb1_doku-21r8390/Zielsetzung/Testprotokoll/) mit Testfällen geschrieben. Davon hatte ich bereits eine **Vorlage**, welche mir erlaubte, dass ich nicht von vorne anfangen musste. Ich habe die Testfälle aus dem Testprotokoll übernommen und in das neue Projekt übertragen.

Ich habe gelernt, wie ich effizient **Fälle** definiere und wie ich diese in einem Testplan verwende. Ich habe gelernt, wie ich Testfälle schreibe und wie ich diese in einem Testplan verwende.

!!! example "Merksatz:"

    - Testfälle sind eine Beschreibung, wie die Software sich in einem **spezifischen Scenario** verhalten soll.
    - Testfälle werden in einem **Testplan** verwendet.

Testfälle erst am Ende des Projektes zu schreiben ist sehr einfach und effizient. Jedoch ist so nicht vorgeschrieben wie die Applikation sich **verhalten** soll. Aus diesem Grund finde ich es besser sich bereits zu Beginn über die Testfälle Gedanken zu machen, damit klar ist was der normale **Ablauf** ist.
