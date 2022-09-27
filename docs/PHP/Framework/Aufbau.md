---
tags:
    - PHP
    - Framework
---

# Framework

Dieses Framework arbeitet mit dem **MVC-Pattern**. Das bedeutet, dass es eine klare Trennung zwischen der Logik, der Darstellung und der Datenbank gibt. Über die **URL** wird gesteuert was für ein Controller und welche Methode davon ausgeführt werden soll. In diesem Kapitel wird beschrieben wie der [Aufbau](#ordnerstruktur) ist, was für [Komponenten](#klassendiagramm) vorhanden sind und wie sie [hinzugefügt](Hinzuf%C3%BCgen.md) werden können.

## Ordnerstruktur

Das Framework hat eine klare :fontawesome-solid-folder-tree: Ordnerstruktur, die sich wie folgt darstellt:

```php title="Ordnerstruktur"
 .
 ├── app
 │   ├── controllers
 │   ├── models
 │   ├── views
 │   └── core
 └── ...
```

Der Ordner `app` enthält alle Dateien, die für das Framework relevant sind. In diesem Ordner befinden sich die Controller, Models und Views. Ausserdem befindet sich hier der `core`-Ordner, der die Grundfunktionen des Frameworks enthält. Die Controller, welche für die Annahme der Requests zuständig sind, befinden sich im Ordner `controllers`. Die Views ist das Aussehen der Seite und befindet sich im Ordner `views`. Für die Datenbankanbindung und die Verarbeitung der Daten sind die Models zuständig und befinden sich im Ordner `models`. Das [Klassendiagramm](#klassendiagramm) zeigt diese Hirarchie nochmals grafisch auf.

## URL-Aufbau

Die URL ist nach einem ganz bestimmten Schema aufgebaut, welche aus drei Teilen besteht. Die URL besteht aus dem **Controller**, der **Methode** und den **Parametern**. Wie der Ablauf einer Abfrage genau aussieht wird im [Sequenziagramm](#ablaufe) dargestellt. Die URL sieht folgendermassen aus:

```powershell title="URL-Aufbau"
http://localhost:8080/controller/method/parameter
```

Die URL wird durch den Router als Parameter `url` an das `index.php` weitergeleitet:

```powershell
http://localhost:8080/index.php?url=/controller/method/parameter
```

## Klassendiagramm

Das Framework hat ein Klassendiagramm, welches die wichtigsten **Klassen** und deren **Beziehungen** darstellt. Das Diagramm sieht wie folgt aus:

![Klassendiagramm](https://www.plantuml.com/plantuml/svg/ZLJ1Yjim4BthAmQl8Gw93xlGGijks98U2gNGItCfPHdBqqHKbeoaR3Sj-VUEb6ni9-wsEacQDvhtvWswzm5Ts3OQieyQlITJArmxR9fC11KqmTcrsAYQW9esxA2XfYBdXMXH_i0rGRQqZZBuBO2NZ8dmhcsFvxYkG5eJdDMQ7Bm57vmoQxY3R6CRodgmXiB6rWE8CZKzzJ4jCY7F67GETmpv-asSmZDuUE1QdBwLePYUxalG5klbYKLnICwtJa_vgKUhwZFifqJbtxZFYKunVIQKmdlHwqLNTT2ILCJMf8kZsBo9fuio1-HAqSyJy94FywF-lCQ0gGk3pBtO3mnwfk27FdrW0u2U0Zlz5w8pI0uKkK66ti5aSi5m1XArBF9VkD7N3BcUGzhVnFqPgtvVq2rjqwBP_H-3aRg1V2XUq9twov9lRzzpbohqj5WCz3E7GQNAeUdchnT8tem5fDNMZGLgyjAfDYXhni8xmfYcJEXTjav9ujllR7cuxDWNVzQOvCdWyQ7-E3L9_bBRRNscFPh68IXMywkRLszULpI5nQ87I6r_4P59TAKyc9YD89dB15RaAdvgQzPaHFmOodBHSpf2UhwNa4mJQJ8ZCeeMMJSisI4VBnEZsYuliU-EKUtbCmC1Gjpp5FAl-0S0 "Klassendiagramm"){ width=90% style="display: block; margin: 0 auto" }

## Abläufe

Das folgende Sequenziagramm zeigt den Ablauf einer **Anfrage**. Die Anfrage wird über die URL gesteuert. Die URL wird in drei Teile aufgeteilt. Der erste Teil ist der Controller, der zweite Teil ist die Methode und der dritte Teil sind die **Parameter**. Die Parameter werden in einem Array gespeichert und an die Methode übergeben. Die Methode wird ausgeführt und gibt die View zurück. Die View wird dann gerendert und ausgegeben.

![Ablauf](https://www.plantuml.com/plantuml/svg/RL91RW8n3Bpd5HQ7NX0VwA5YrIj8NDehCXklY9HDLbwd5V_X6RtniPfi15aW9tiyOq_Yh4T1bjHxM3G7ZwbR677YwPwQGGckTGC6WMOOPlbd3CBHU-8Pl8sM_0pvTlHhZCfXzN7j0k-mtxSnZCAf5OEjk1yKoWDgsdAfJ6qqqXTxmoI90pJCU8BU2UoGiISX3iyg7z5M_a1FeTpHYLdbnAEGHY7poxpDvMm5B8NwlgLM8IyTR4cEqPfv9qSmuNGJFNegTT0TSEgAdugaalpAXPt3b-QdNJohhnkPn3cwQU4D3jHT_Xxxv0sMs9Wr1Qk_vXy0 "Ablauf"){ style="display: block; margin: 0 auto" }
