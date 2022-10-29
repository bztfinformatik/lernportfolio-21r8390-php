---
tags:
    - PHP
    - Twig
---

# Twig

Twig ist eine **Template Engine** für PHP. Sie ist eine Alternative zu PHP selbst, um HTML-Code zu generieren. Es ist eine Open-Source-Software, die unter der MIT-Lizenz veröffentlicht wurde. Sie ist eine der am häufigsten verwendeten Template-Engines für PHP. Zudem gibt es eine ausführliche Dokumentation, die [hier](https://devdocs.io/twig~3/) zu finden ist. Da diese für das schnelle Nachschlagen zu ausführlich ist kann auch in einer selbstgeschriebenen [Kurzreferenz](../../PHP/Twig/Design.md) nachgeschlagen werden.

Eine Template-Engine ist eine Software, die HTML-Code aus Daten generiert. Es sollte **repetitive** Schritte abnehmen und das bauen von eigenständigen Komponenten ermöglichen. Der Syntax ist bei allen Engines unterschiedlich, aber die Grundidee ist die gleiche.

## Verwendung

Twig wird verwendet, um **wiederkehrender** HTML-Code zu extrahieren und so die Wartung zu erleichtern. Die Installation von Twig ist mithilfe von [Composer](https://getcomposer.org/) sehr einfach. Wie dies gemacht wird und was beim Controller zu beachten ist, ist [hier](../../PHP/Twig/Installation.md) zu finden.

Es können zum Beispiel HTML-Tabellen generiert werden, die Daten aus einer Datenbank enthalten. HTML ist eine statische Sprache, was bedeutet, dass es nicht möglich ist, **dynamische** Inhalte zu erstellen. Twig ermöglicht es jedoch, diese Problematik zu umgehen und in HTML einzufügen. Die [Logik](../../PHP/Twig/Logik.md) sieht dann so aus:

```twig
{% for user in users %}
    {{ user.name }}
{% else %}
    No users have been found.
{% endfor %}
```

Wichtig anzumerken ist, dass die Datei mit `.twig.html` endet. Dies informiert den Webserver, dass die Datei mit Twig **verarbeitet** werden muss, bevor sie an den Browser gesendet wird.

Ein Funktionsaufruf wird mit `{%` und `%}` eingeleitet und beendet. Die Logik wird in der Mitte platziert. Die Variablen werden mit `{{` und `}}` angegeben. Man merkt, dass die Logik sehr ähnlich zu PHP ist. Das liegt daran, dass Twig auf PHP basiert. Twig ist also eine **Alternative** zu PHP, um HTML-Code zu generieren.

## Problemlösung

Wie bereits angemerkt ist es nicht möglich, dass man im HTML dynamische Inhalte erstellen kann. Aus diesem Grund verwendet man PHP, was **Schleifen** und **Prüfungen** ermöglicht. PHP Code direkt in das HTML zu schreiben ist jedoch nicht gut, da es die **Lesbarkeit** des Codes beeinträchtigt. Twig ermöglicht es, PHP-Code in HTML zu schreiben, ohne die Lesbarkeit zu beeinträchtigen. Zudem können die Templates wiederverwendet werden, was die Wartung erleichtert. Durch flexible Erweiterungen kann Twig an die eigenen **Bedürfnisse** angepasst werden.

### Sicherheit

Wenn man von [Sicherheit](../../Appendix/Sicherheit.md) spricht, dann ist es wichtig zu wissen, dass Twig **automatisch** alle Variablen mit Leichtigkeit **escapen** kann. Das bedeutet, dass Variablen, die in HTML-Code eingefügt werden, automatisch validiert und in eine nicht gefährliche Version gebracht werden. Genauer beschrieben wird dieses verhalten im [Design](../../PHP/Twig/Design.md#escape). So kann beispielsweise der JavaScript Code:

```javascript
<script>alert('Hello World');</script>
```

In folgendes ungefährliches HTML umgewandelt, was **reiner Text** ist:

```html
&lt;script&gt;alert(&#039;Hello World&#039;);&lt;/script&gt;
```

Der User merkt von dieser Umwandlung nichts und sieht nur den Text, so wie er ihn eingegeben hat. Die `&`-Zeichen sind eine andere Art von Zeichen, welche nicht interpretiert werden. So kann zum Beispiel das Zeichen `<` in `&lt;` umgewandelt werden.
