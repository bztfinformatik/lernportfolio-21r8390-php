---
tags:
    - LB1
---

# Rendering

In der Vergangenheit gab es immer wieder extreme **Entwicklungen** im Bereich Rendering. Zuerst wurde alles **Server-Side** gerendert, bis man auf die Idee gekommen ist, dass der Client alles über **Client-Side** laden könnte. Mittlerweile haben sich diese Extreme etwas gefangen und man versucht das Beste aus [beiden Welten](https://arkwright.github.io/images/scaling-react-server-side-rendering/ssr-csr.svg) zu nehmen. Die erste Anfrage wird Serverseitig gerendert. In der Applikation wird dann die **Navigation** Clientseitig betätigt. So bekommt man die Vorteile vom schnellen Laden und die angenehme Steuerung. Es gibt noch weitere Methoden wie **Pre-Render** Seiten, wobei die Dateien zuvor als statisches HTML generieren. Wenn eine Anfrage kommt, dann wird ohne Bearbeitung oder Interpretation die Seite zurückgegeben. Dies ist für dynamische Werte nicht möglich, da diese erst zur **Laufzeit** berechnet werden können. Beide folgenden Kapitel wurden aus einer externen der [Webseite](https://www.toptal.com/front-end/client-side-vs-server-side-pre-rendering) entnommen.

## Diagramm

Das folgende Diagramm zeigt den **Ablauf** einer Client-Side-Rendering Anwendung:

```mermaid
graph LR
    A[Client] --> |URL| B{JavaScript Framework};
    B --> |Ajax Anfrage an Server| C[Webserver];
    C --> |JSON / XML / YAML| B;
    B --> |Daten verarbeiten| B;
    B --> |HTML generieren| A;
```

<small style="text-align: center; display:block;">[Link zu PlantUML](https://www.plantuml.com/plantuml/svg/BSv12u9G30Vm-_iKmxjqBmYVHeHeGHRLSTQILxfYlgoFttfv6OFV_p-Mz1x5lxhMH5dhY7q4s8E5E9v3bEE0rLdSqyDIiAFtG-x1KvZ2VbkOz9yxKDsJ32G1CqLxmmzOlWes1CXG1JPPoF_QURLPmmIEPQ7pPCjmQxG5UcBGF4fDJlVHhDfgfus6cCIH4CzCGdpHzxy0)</small>

## Client Side Rendering

Clientseitiges Rendering ermöglicht es Entwicklern, ihre Websites mit **JavaScript** vollständig im Browser zu laden. Anstatt für jede URL eine eigene HTML-Seite zu haben, wird bei einer clientseitig gerenderten Website jede Route **dynamisch** direkt im Browser erstellt. Dieser Ansatz verbreitete sich, als die JS-Frameworks ihn leicht anwendbar machten. Wenn CSR von Hand gemacht wird, dann wird meistens [Ajax](https://www.w3schools.com/xml/ajax_intro.asp) verwendet. Dies ist eine Technik, die es ermöglicht, Daten von einem Server zu laden, ohne die Seite neu zu laden. Dies ist ein **Asynchroner** Vorgang, der die **Performance** verbessert. Die **Nachteile** sind, dass die Seite nicht von Suchmaschinen gescannt werden kann und die **Erstellung** der Seite dauert länger, da die Daten erst geladen werden müssen. Zudem wird JavaScript für das Laden benötigt, was gewisse Bots beim Indexieren nicht auslösen.

## Server Side Rendering

Eine Webseite direkt auf dem Server mit **benutzerdefinierten** Daten auszufüllen, ermöglicht das serverseitige Rendering. Das Layout und angezeigte HTML wird direkt gesteuert, sodass nur der benötigte Inhalt zum Browser kommt. Wenn eine Anfrage kommt, dann werden die Daten geladen. Danach wird anhand der Daten das HTML zusammengestellt. Felder wie **Titel** und **Beschreibung** werden mit den Daten gefüllt. Sobald dieser Vorgang beendet ist wird die Seite an den Browser gesendet. In der Regel sind einmalige Anfragen an den Server schneller, als zusätzliche **Browser-zu-Server-Rundreisen** für sie zu machen, was bei CSR der fall ist. Zudem sehen Suchmaschinen den Inhalt der Seite, was die **Indexierung** erleichtert. JavaScript kommt beim SSR nicht oder nur selten zum Einsatz, was für Bots eine **Vorteil** ist.

Der Nachteil ist, dass man keine Infos über das **Verhalten** des Users hat. Dies ist ein Problem, wenn analysiert werden soll, wie die Seite genutzt wird. Ausserdem ist es schwierig, die **Navigation** zu steuern oder zu wissen welches Feld aktuell fokussiert ist. Da in einer Abfrage die Daten ändern können kann der Inhalt nicht beim Laden der Seite gecached werden. Dies führt zu einer **langsameren** Seite.

## Fazit

Ein klarer Gewinner zwischen SSR und CSR gibt es nicht, da beide Vor- und Nachteile haben. Es sollte deswegen immer abgewogen werden, welche Anwendung für die jeweilige Situation am besten geeignet ist.

-   Da CSR den Inhalt der Seite erst nach dem Laden anzeigt ist die `Time to First Byte` (TTFB) bei besser. Jedoch ist die `Time to First Meaningful Paint` (TTMFP) bei SSR besser, da der Inhalt der Seite schneller angezeigt wird.
-   SEO ist bei SSR besser, da der HTML Code bereits vorher geladen wurde und somit auch von **Suchmaschinen** gescannt werden kann. Bei CSR wird der HTML Code erst nachgeladen und somit nicht von Suchmaschinen gescannt.
-   Das clientseitige Rendering verwaltet das Routing dynamisch, ohne die Seite jedes Mal zu aktualisieren, wenn ein Benutzer eine andere Route anfordert.
-   Das serverseitige Rendering ist in der Lage, beim ersten Laden einer beliebigen Route der Website eine **vollständig** ausgefüllte Seite anzuzeigen, während beim clientseitigen Rendering zunächst eine **leere Seite** angezeigt wird.

## Beispielprojekt

Zur **Veranschaulichung** einer CSR-Webseite mittels PHP wurde ein Projekt erstellt. Als Vorlage galt der ÜK 307, in welchem bereits eine Grundstruktur dafür erstellt wurde. Aus dem neu gelernten Wissen aus diesem Modul wurde diese Struktur erweitert. Die Webseite stellt eine Liste von Kunden dar. Über einen **Hinzufügen**-Knopf kann ein neuer Kunde in die **SQLite** Datenbank geladen werden. Falls die Werte nicht gültig sind, wird eine Fehlermeldung ausgegeben. Das Projekt kann unter [GitHub](https://github.com/bztfinformatik/lernportfolio-21r8390-php/tree/main/Aufgaben/002_ClientSide/) eingesehen werden. Eine Live-Demo ist unter meiner [eigenen Webseite](https://edu.flimtix.dev/M133-Aufgaben/CSR/) verfügbar. Als **exakte Aufgabe** sollte es anstatt einer Datenbank über eine Datei gespeichert werden. Zur Vollständigkeit wurde dies auch noch nebenbei umgesetzt und kann auf [GitHub](https://github.com/bztfinformatik/lernportfolio-21r8390-php/tree/main/Aufgaben/003_ClientSideSchule) begutachtet werden.
