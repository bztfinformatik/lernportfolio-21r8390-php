---
tags:
    - PHP
    - Twig
---

# Design

Der HTML-Code kann in **Komponente** untergebracht werden, damit er wiederverwendbar ist. Dazu muss nur eine Datei mit der Endung `.twig.html` erstellt werden. Twig hat unglaublich viele Funktionen, die es ermöglichen, den HTML-Code zu vereinfachen. Die gesamte Liste ist [hier](https://twig.symfony.com/doc/3.x/) zu finden. Hier werden die wichtigsten Anwendungen vorgestellt und erklärt.

## Einbinden

In einer Komponente kann HTMl ausgelagert werden, damit es **wiederverwendbar** ist. Der Inhalt kann dann nach Belieben eingebunden werden. Das Einbinden funktioniert über folgenden Inhalt:

```twig
{{ include('ordner/dateiname.twig.html') }}
```

Dabei wird der gesamte Inhalt in die Stelle eingefügt, an der der Befehl steht. Es können auch Variablen an die Komponente **weitergegeben** werden.

```twig
{% set vars = {'foo': 'bar'} %}
{% include 'template.html' with vars %}
```

## Erweitern

Eine bestehende Komponente kann auch erweitert werden, um Daten darin anzuzeigen. Dies ist sehr nützlich um Inhalte von Komponenten zu definieren. Für die Erweiterung wird eine **Basisklasse** benötigt, die mit `block` einen überschreibbaren Bereich definiert. Wenn die Komponente erweitert wird, kann der Inhalt des Blocks anhand des Namens überschrieben werden. Der Inhalt wird angezeigt, wenn die Komponente nicht erweitert wird.

```twig title="Basislayout"
<div>
    {% block content %}
        <p>Dieser Bereich kann überschrieben werden</p>
    {% endblock %}
</div>
```

Im gegensatz zum [Einbinden](#einbinden) wird das Basislayout über `extends` eingebunden. Mit dem Namen des Blockes kann der Inhalt **überschrieben** werden. Wenn der vorherige Inhalt noch benötigt wird, dann kann er mit `parent()` eingebunden werden.

```twig title="Erweiterung"
{% extends 'ordner/dateiname.twig.html' %}

{% block content %}
    {{ parent() }}
    <p>Der Inhalt wird angezeigt, wenn die Komponente erweitert wird</p>
{% endblock %}
```

## If / Else

Fast am häufigsten möchte man abhängig einer **Kondition** etwas anderes anzeigen. Dies kann mit `if` und `else` gemacht werden. Wenn die Kondition erfüllt ist, wird der Inhalt des `if`-Blocks angezeigt. Ansonsten die des `else`-Blocks. Es verhält sich somit gleich wie das PHP [If](../Aufgaben/Vergleiche.md#if-statements). Mithilfe von `endif` wird das Ende einer Bedingung gekennzeichnet.

```twig
{% if condition %}
    <p>Kondition ist wahr</p>
{% elseif condition2 %}
    <p>Die Kondition ist nicht wahr, aber die Alternative ist wahr</p>
{% else %}
    <p>Keine der Konditionen ist wahr</p>
{% endif %}
```

## For

Eine **Liste** über PHP anzuzeigen ist sehr einfach, jedoch semantisch schwer zu lesen, da mit `echo` gearbeitet werden muss. Twig bietet die Möglichkeit, eine Liste über eine Schleife einfach anzuzeigen. Dazu wird eine Variable benötigt, die eine Liste enthält. Mit `for` wird die Schleife definiert, welche üblicherweise ein [Foreach](../Aufgaben/Schleifen.md#foreach) abbildet. Mit `in` wird die Variable angegeben, die die Liste enthält. Gleich wie beim [If](#if-else) wird das Ende gekennzeichnet, was mit `endfor` geschieht.

```twig
{% for item in list %}
    <p>{{ item }}</p>
{% else %}
    <p>Liste enthält keine Elemente</p>
{% endfor %}
```

Wenn eine Liste keine Elemente enthält kann mit `else` ein Inhalt angezeigt werden. Durch das Hinzufügen von `key` könnte auch der **Index** angezeigt werden.

```twig
{% for key, item in list %}
    <p>{{ key }}: {{ item }}</p>
{% endfor %}
```

## Escape

Häufig werden **Eingaben** von Kunden an einem anderen Ort angezeigt. Diese Eingaben können HTML-Code enthalten, der nicht ausgeführt werden soll. Twig bietet die Möglichkeit, den HTML-Code zu **escapen**. Dies kann mit `|escape` gemacht werden. Wenn eine bestimmte Sprache nicht erlaubt ist, dann kann mit `autoescape` ein Bereich definiert werden, in welchem diese Sprache escaped wird.

```twig
{% autoescape "html" %}
    {{ var }}
    {{ var|raw }}     {# var won't be escaped #}
    {{ var|escape }}  {# var won't be doubled-escaped #}
{% endautoescape %}
```

So kann [XSS](../Appendix/Sicherheit.md#xss) verhindert werden, da JavaScript nicht ausgeführt wird. Twig bietet auch die Möglichkeit dies nur auf eine Variable anzuwenden. Dies kann mit `|e('Sprache')` gemacht werden.

```twig
{{ '<script>alert("XSS")</script>'|e('js') }}
```
