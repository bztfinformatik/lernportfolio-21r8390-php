---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 17. Woche <span style="float:right">22.12.2022</span>

???+ abstract "Zusammenfassung"

    - [Sicherheitslücken](#sicherheitslucken)
    - [Concept Map](#concept-map)

!!! warning "Ausfall"

    Diese Woche hatten die Applikationsentwickler eine Prüfung im Modul 326, in welchem wir ein Projekt von Beginn bis Ende realisieren mussten.
    Der Verpasste Inhalt wurde dennoch im Selbststudium nachgeholt.

## Sicherheitslücken

In letzter Zeit gab es wieder viele **Sicherheitslücken**, welche für Unruhe sorgten. Die bekanntesten waren **Citrix** und das **FBI**. Das FBI hat auf einem nicht genügen gesicherten Server wichtige personenbezogene Daten gespeichert. Angreifer konnte sich so Zugang zu den Daten verschaffen und diese veröffentlichen. Citrix hat eine Sicherheitslücke in der Software, welche die Kommunikation zwischen den Clients und dem Server ermöglicht (**RCE**). Diese Lücke ermöglichte es Angreifern, sich Zugang zu den Servern zu verschaffen und diese zu übernehmen.

Anhand von [Internetartikeln](https://www.heise.de/news/FBI-Daten-hochrangiger-Personen-aus-Bereich-kritischer-Infrastrukturen-geklaut-7395857.html?wt_mc=rss.red.security.security.atom.beitrag.beitrag) habe ich die Sicherheitslücken analysiert und versucht zu verstehen, wie diese entstanden sind. Solche Lücken treten immer wieder auf und bleiben meist lange offen, bis sie entdeckt werden. Mithilfe von [CVE](https://www.redhat.com/en/topics/security/what-is-cve)-**Listen** kann nachgeschaut werden, welche Sicherheitslücken es gibt und wie diese behoben werden können.

Ich habe gelernt, dass es wichtig ist Sicherheitslücken zu kennen und zu verstehen wie sie auftreten. Durch dieses **Wissen** kann ich selbst nach Lücken suchen und diese frühzeitig vermeiden. Für die Software, welche ich selbst programmiere, ist es wichtig, dass ich die Sicherheitslücken kenne und diese vermeide. Durch das Vermeiden von Sicherheitslücken kann ich die **Sicherheit** meiner Software erhöhen und somit die Sicherheit der Daten, welche mit meiner Software verarbeitet werden.

!!! example "Merksatz:"

    - Sicherheitslücken sind Schwachstellen in Software, welche es Angreifern ermöglichen, sich Zugang zu Daten zu verschaffen.
    - CVE-Listen sind Listen, welche Sicherheitslücken aufzeigen und wie diese behoben werden können.
    - Wissen über Sicherheitslücken ist wichtig, um diese frühzeitig zu vermeiden.

Mir ist aufgefallen, dass gewisse Firmen die Sicherheitslücken nicht schnell genug beheben oder dies gar nicht **öffentlich** machen. Dies ist sehr gefährlich, da Angreifer so lange Zeit haben, um sich Zugang zu den Daten zu verschaffen. Es ist wichtig, dass die Lücken öffentlich gemacht werden, da gewisse Firmen ansonsten keine **Updates** durchführen.

## Concept Map

Bei dieser Abgabe mussten wir wieder ein [Concept Map](../LB2/04_ConceptMap.md) erstellen. Dieses Mal ging es um **Sessions**, **Cookies** und **Authorisierungen**. Die Begriffe sind sehr einfach zu verknüpfen, da sie alle zusammenhängen. Danach schrieb ich das UML Diagramm und die Notizen zu den Schlüsselwörtern.

Wie das letzte Mal habe ich zuerst mich über alle Begriffe informiert und möglichst viel Wissen darüber aufgebaut. Durch meine [Zusammenfassung](../PHP/SessionCookie/Sessions.md) hatte ich bereit eine grosse Erfahrung, welche mir half. Danach habe ich die Zusammenhänge analysiert und eingeteilt. Ich habe die Begriffe in 3 Kategorien eingeteilt: **Server**, **Client** und **Daten**. Danach habe ich die Begriffe mit den Kategorien verknüpft und die Notizen geschrieben.

!!! example "Merksatz:"

    - Sessions sind temporäre Daten, welche auf dem **Server** gespeichert werden.
    - Cookies sind temporäre Daten, welche auf dem **Client** gespeichert werden.

Dies ist das letzte Mal, dass wir eine Concept Map erstellen müssen. Ich habe gelernt, dass es wichtig ist, sich vorher gut zu informieren und möglichst viel **Wissen** aufzubauen. Durch das Aufbauen von Wissen kann ich die Zusammenhänge besser verstehen und diese besser erklären.
