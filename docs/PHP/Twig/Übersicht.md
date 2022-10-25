---
tags:
    - PHP
    - Twig
---

# Twig

Twig ist eine **Template Engine** für PHP. Sie ist eine Alternative zu PHP selbst, um HTML-Code zu generieren. Es ist eine Open-Source-Software, die unter der MIT-Lizenz veröffentlicht wurde. Sie ist eine der am häufigsten verwendeten Template-Engines für PHP. Zudem gibt es eine ausführliche Dokumentation, die [hier](https://devdocs.io/twig~3/) zu finden ist.

Eine Template-Engine ist eine Software, die HTML-Code aus Daten generiert. Es sollte **repetitive** Schritte abnehmen und das bauen von eigenständigen Komponenten ermöglichen. Der Syntax ist bei allen Engines unterschiedlich, aber die Grundidee ist die gleiche.

## Verwendung

Twig wird verwendet, um **wiederkehrender** HTML-Code zu extrahieren und so die Wartung zu erleichtern. Es können zum Beispiel HTML-Tabellen generiert werden, die Daten aus einer Datenbank enthalten. HTML ist eine statische Sprache, was bedeutet, dass es nicht möglich ist, **dynamische** Inhalte zu erstellen. Twig ermöglicht es jedoch, diese Problematik zu umgehen und in HTML einzufügen. Der Code sieht dann so aus:

```twig
{% for user in users %}
    * {{ user.name }}
{% else %}
    No users have been found.
{% endfor %}
```

Wichtig anzumerken ist, dass die Datei mit `.twig.html` endet. Dies informiert den Webserver, dass die Datei mit Twig verarbeitet werden muss, bevor sie an den Browser gesendet wird.

## Problemlösung

Wie bereits angemerkt ist es nicht möglich, dass man im HTML dynamische Inhalte erstellen kann. Aus diesem Grund verwendet man PHP, was **Schleifen** und **Prüfungen** ermöglicht. PHP Code direkt in das HTML zu schreiben ist jedoch nicht gut, da es die **Lesbarkeit** des Codes beeinträchtigt. Twig ermöglicht es, PHP-Code in HTML zu schreiben, ohne die Lesbarkeit zu beeinträchtigen. Zudem können die Templates wiederverwendet werden.

### Sicherheit

Wenn man von [Sicherheit](../Appendix/Sicherheit.md) spricht, dann ist es wichtig zu wissen, dass Twig **automatisch** alle Variablen mit Leichtigkeit **escapen** kann. Das bedeutet, dass Variablen, die in HTML-Code eingefügt werden, automatisch validiert und in eine nicht gefährliche Version gebracht werden. Genauer beschrieben wird dieses verhalten im [Design](Design.md#escape). So kann beispielsweise der JavaScript Code:

```javascript
<script>alert('Hello World');</script>
```

In folgendes ungefährliches HTML umgewandelt, was **reiner Text** ist:

```html
&lt;script&gt;alert(&#039;Hello World&#039;);&lt;/script&gt;
```
