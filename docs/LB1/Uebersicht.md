---
tags:
    - LB1
hide:
    - toc
---

# Übersicht

Das Ziel von diesem Projekt ist, dass ein Geschäftsprozess digitalisiert wird. In der Schule und während der Arbeit schreibe ich vermehrt Dokumentationen. Diese mithilfe von [MkDocs](https://squidfunk.github.io/mkdocs-material/) auf zu setzen ist grundsätzlich nicht schwer, jedoch eine aufwändige Arbeit. Meist dauert es einen Tag, bis die Doku mit allen Sonderheiten konfiguriert ist. Dieses Projekt soll die Arbeit erleichtern und die Dokumentationen automatisieren, was den Prozess beschleunigt. In einem Formular kann ein Antrag für eine neue Dokumentation erstellt werden. Dieser wird dann von einem Administrator bestätigt, wenn alle Angaben stimmen. Die Dokumentation wird dann auf einem Webserver abgelegt und kann von jedem mit einem Link aufgerufen werden.

## Idee

-   MkDocs über Website konfigurieren
    -   Konfiguration
    -   [Ordnerstruktur](https://mudblazor.com/components/treeview#custom-tree)
        -   Dateien
    -   Plugins
    -   Beispielseite (Alle möglichen MkDocs Features mit Beispielen)
    -   Tags
    -   Farben
    -   Fonts
    -   GitRepo
    -   Name
-   Admin / Lehrer bestätigen
    -   Ablehnen mit Rückmeldung / Verbesserung
-   Nach Bestätigung Download verfügbar
-   Backend
    -   [Elastic Stack](elastic.co/elastic-stack/)
    -   [Cypress](https://www.cypress.io/)
    -   XSS / SQL-Injection sicher
    -   [Sendgrid](https://sendgrid.com/) für Mails / Benachrichtigungen
-   Frontend
    -   [TailwindCSS](https://tailwindcss.com/)
    -   [Twig](https://twig.symfony.com/)
