---
tags:
    - Anleitung
hide:
    - toc
---

# GitHub Pages Einrichten

Mithilfe dieser Anleitung kann [GitHub Page](https://pages.github.com/) eingerichtet werden.

GitHub Pages ist ein Hosting-Service für **statische** Webseiten, der HTML-, CSS- und JavaScript-Dateien direkt aus einem Repository auf GitHub übernimmt, die Dateien optional durch einen Build-Prozess führt und eine Website veröffentlicht.

![GitHub Settings](GitHubSettingsLight.png#only-light){ loading=lazy title="Bild ist abhängig vom Theme" }
![GitHub Settings](GitHubSettingsDark.png#only-dark){ loading=lazy title="Bild ist abhängig vom Theme" }

Um GitHub Pages zu aktivieren, muss man _Administratorrechte_ besitzen. Wenn diese vorhanden sind, dann sollte in der Taskleiste als letzte Option **:octicons-gear-16: Settings** zu sehen sein. Nach dem Öffnen der Einstellungen sollte unter dem linken Menüpunkt _Code and automation_ die Option **:octicons-browser-16: Pages** auffindbar sein.

Die einfachste Methode ist, unter _Build and deployment_ die Option **:material-form-dropdown: Deploy from a branch** auszuwählen. Folglich muss daraufhin der **:material-source-branch-check: Branche** ausgewählt werden, in welcher sich die Dokumentation befindet. Normalerweise befindet sich die Dokumentation in einem Unterordner (_/docs_), weswegen dort der dementsprechende **:octicons-file-directory-fill-16: Pfad** angegeben werden muss.

Nach dem Speichern kann es _5 - 10 Minuten_ dauern, bis die Webseite aufrufbar ist. Auch nach einem Commit dauert es einige Zeit, bis die Änderungen angezeigt werden. Die URL zur Seite erscheint nach der Wartezeit unter der im Bild gezeigten Seite. Zusätzlich wird eine **:octicons-play-16: Action** erstellt, mit welcher der Status der Seite angezeigt werden kann.
