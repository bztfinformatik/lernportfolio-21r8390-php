---
tags:
    - Reflexion
hide:
    - toc
ᴴₒᴴₒᴴₒ: true
---

# 6. Woche <span style="float:right">22.09.2022</span>

???+ abstract "Zusammenfassung"

    -   [Eigenes Framework](#framework)
    -   [Aufbau](#aufbau)
    -   [Auto hinzufügen](#hinzufugen)

## Framework

Um PHP besser kennen zu lernen und zu verstehen wie [Frameworks](../PHP/Framework/Aufbau.md) aufgebaut sind, erstellten wir heute unser **eigenes Framework**. Dabei wird aus der [URL](../PHP/Framework/Aufbau.md#url-aufbau) der Controller und die Methode mit den Parametern gelesen. Die Controllers und Views werden automatisch instanziiert. In der Lektion erstellten wir die [Dateistruktur](../PHP/Framework/Aufbau.md#ordnerstruktur).

Von Herr Inauen haben wir ein bereits **konfiguriertes Projekt** erhalten, welches den groben Aufbau bereits enthält. Wir mussten lediglich verstehen wofür die einzelnen Dateien und Ordner sind und wie sie funktionieren. Das bei half es eigene Endpunkte zu erstellen und mit diesen zu **experimentieren**.

Ich habe gelernt, dass Frameworks sehr oft ähnlich aufgebaut sind. Sobald man ein Framework versteht sollte es nicht allzu schwer sein ein anderes zu verstehen. Aus dem eigenen Framework habe ich zudem verstanden wie die URL aufrufe in **Klasseninstanzen** resultieren können. Mir war zuvor nicht bewusst, dass aus einem String eine Klasse erstellt werden kann.

!!! example "Merksatz:"

    -  Die **URL** wird in **Controller** und **Methode** mit **Parametern** aufgeteilt.
    -  UMLs sind sehr hilfreich um den Aufbau zu verstehen.

Besonders fasziniert hat mich, die Einfachheit der Frameworks. Es ist erstaunlich wie viel Arbeit Frameworks abnehmen können. Ich habe mich gefragt, ob es nicht möglich wäre selbst ein Framework zu erstellen, welches Objekte in die **Datenbank** spiegelt ([ORM](https://stackoverflow.com/a/1279678)), da dies ja auch ein sehr repetitiver Prozess ist.

## Aufbau

Sich in ein komplett neues Projekt **einzuarbeiten** ist nicht ganz einfach. Deswegen schauten wir uns den [Aufbau](../PHP/Framework/Aufbau.md) der Ordner und Dateien genauer an. Es gibt Router (_.htaccess_), Controller und Views. Die Controller werden automatisch instanziiert und die Views werden automatisch geladen. Die Views können mit den Daten der Controller befüllt werden. Die Daten werden in der URL übergeben.

Den Aufbau des Frameworks haben wir mit einem [UML-Diagramm](../PHP/Framework/UML/Klassen.puml) dargestellt. Dieses **Diagramm** zeigt die Beziehungen zwischen den einzelnen Klassen. Es ist sehr hilfreich um den Aufbau zu verstehen und zu visualisieren. Auch nicht **Informatiker** können so die Verbindungen verstehen.

Neu waren für mich die [.htaccess](https://httpd.apache.org/docs/current/howto/htaccess.html) Dateien. Diese informieren den Server wie er die URL auflösen soll. Dort können Endungen entfernt werden oder die URL umgeleitet werden. Die .htaccess Dateien sind sehr nützlich um die URL aufzuräumen. So können zum Beispiel die Dateiendungen entfernt oder die URL als Parameter übergeben werden.

!!! example "Merksatz:"

    - .htaccess Dateien sind sehr nützlich um die URL aufzuräumen.
    -  Die Strukturen von Frameworks sind oft vergleichbar.

Verwundert hat mich, dass die URL als Parameter übergeben wird. Ich hätte erwartet, dass die URL in der .htaccess Datei aufgelöst wird und die Werte direkt an den Controller übergeben werden. Wenn ich irgendwann selbst eine Webseite erstelle, werde weiss ich nun, wie ich die URL **aufbereiten** kann.

## Hinzufügen

Eines der **wichtigsten** Aufgaben beim Entwickeln ist das Hinzufügen von neuen Dateien. Wie dies mit Beachtung auf das **MVC-Pattern** funktioniert, haben wir heute gelernt. Dabei muss beachtet werden in welchen Ordner die Datei gehört, da sie ansonsten nicht gefunden werden kann. Wir fügten ein neues Model _Auto_ hinzu und die dazugehörigen Dateien für das MVC-Pattern.

Zuerst schauten wir uns an wie die bestehenden Models verwendet und angezeigt werden. Danach schrieb ich eine [Zusammenfassung](../PHP/Framework/Hinzuf%C3%BCgen.md) der **bestehenden** Dateien. Anhand der gewonnenen Erkenntnisse erstellte ich die neuen Dateien. Dabei musste ich keine bestehenden Dateien ändern, da diese schön getrennt waren.

Wie ein neues Model hinzugefügt wird, habe ich während dieser **Aufgabenstellung** gelernt. Ich kann nun selbstständig ein Model verwenden und dieses in die View einbinden. Ich habe gelernt, dass es wichtig ist die bestehenden Dateien zu verstehen, da diese die Grundlage für die **Erweiterung** bilden.

!!! example "Merksatz:"

    - Es ist wichtig die bestehenden Dateien zu verstehen, da diese die Grundlage für die Erweiterung bilden.
    - Getrennter Code ist für die Wartung und Erweiterung extrem wichtig.

Ein neues Model hinzuzufügen war für mich nur eine **Kleinigkeit**, weswegen ich dies in wenigen Minuten hatte. Die Zusammenfassung hingegen dauerte wesentlich länger, da ich genau recherchierte was der Grund hinter dem Aufbau ist und was für Vor- oder auch Nachteile dieser Ansatz mit sich bringt.
