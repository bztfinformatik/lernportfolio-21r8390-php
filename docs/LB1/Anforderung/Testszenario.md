---
tags:
    - LB1
    - Anforderung
---

# Testszenario

Ein Testszenario beschreibt die **Testumgebung**, in welche die Tests ausgeführt werden. Zudem erhält der die **Aktion** die zu Überprüfen ist. Gleich wie die [Use Cases](UseCases.md) und die [Anforderungen](Funktionale.md) sind sie **Nummeriert**.

## Start

| S-0001       | Registrieren & Verifizieren                        |
| ------------ | -------------------------------------------------- |
| Vorbedingung | Der Benutzer ist nicht registriert.                |
| Schritte     | Nutzer öffnet die Startseite                       |
|              | Klickt in der oberen Navigation auf `Registrieren` |
|              | Gibt seine Anmeldedaten ein                        |
|              | Lädt ein Bild hoch                                 |
|              | Klickt auf `registrieren`                          |
|              | Bekommt das Mail zur Verifizierung                 |
|              | Bestätigt die Email-Adresse                        |

| S-0002       | Anmelden                                           |
| ------------ | -------------------------------------------------- |
| Vorbedingung | Account wurde erstellt & verifiziert               |
|              | Der Benutzer ist nicht angemeldet                  |
| Schritte     | Nutzer öffnet die Startseite                       |
|              | Klickt in der oberen Navigation auf `Registrieren` |
|              | Gibt seine Anmeldedaten ein                        |
|              | Klickt auf `anmelden`                              |
|              | Anmeldedaten werden validiert                      |
|              | Wirt auf Dashboard weitergeleitet                  |

## User

| U-0001       | Profil bearbeiten                             |
| ------------ | --------------------------------------------- |
| Vorbedingung | Angemeldet                                    |
| Schritte     | Nutzer öffnet das Dashboard                   |
|              | Klickt in der Navigation auf das `Profilicon` |
|              | Wird zum Profil weitergeleitet                |
|              | Ändert die Email-Adresse                      |
|              | System validiert die Änderungen               |
|              | Speichert die Änderungen auf der Datenbank    |

| U-0002       | Neues Vorlage                           |
| ------------ | --------------------------------------- |
| Vorbedingung | Angemeldet                              |
| Schritte     | Nutzer öffnet das Dashboard             |
|              | Klickt auf das `Plus` in der Navigation |
|              | Formular öffnet sich                    |
|              | Allgemeine Daten werden eingegeben      |
|              | `Weiter` wird geklickt                  |
|              | Allgemeine Daten werden validiert       |
|              | Es wird zur nächsten Seite navigiert    |
|              | Progressbar steigt voran                |
|              | Vorherige Anweisungen wiederholen       |
|              | Fertig klicken                          |
|              | Vorlage zur Bestätigung markieren       |
|              | Vorlage auf Dashboard anzeigen          |

| U-0003       | Vorlage bearbeiten                                        |
| ------------ | --------------------------------------------------------- |
| Vorbedingung | Angemeldet & Vorlage erstellt                             |
| Schritte     | Nutzer öffnet das Dashboard                               |
|              | Klickt auf das `Bearbeiten`-Symbol in der Vorlagenansicht |
|              | Formular öffnet sich                                      |
|              | Allgemeine Daten werden eingegeben                        |
|              | `Weiter` wird geklickt                                    |
|              | Allgemeine Daten werden validiert                         |
|              | Es wird zur nächsten Seite navigiert                      |
|              | Progressbar steigt voran                                  |
|              | Vorherige Anweisungen wiederholen                         |
|              | Fertig klicken                                            |
|              | Vorlage zur Bestätigung markieren                         |
|              | Vorlage auf Dashboard anzeigen                            |

| U-0004       | Vorlage löschen                                        |
| ------------ | ------------------------------------------------------ |
| Vorbedingung | Angemeldet & Vorlage erstellt                          |
| Schritte     | Nutzer öffnet das Dashboard                            |
|              | Klickt auf das `Löschen`-Symbol in der Vorlagenansicht |
|              | Bestätigung wird angezeigt                             |
|              | Bestätigung wird bestätigt                             |
|              | Vorlage wird gelöscht                                  |

| U-0005       | Vorlage herunterladen                                        |
| ------------ | ------------------------------------------------------------ |
| Vorbedingung | Angemeldet & Vorlage erstellt                                |
| Schritte     | Nutzer öffnet das Dashboard                                  |
|              | Klickt auf das `Herunterladen`-Symbol in der Vorlagenansicht |
|              | Status wird überprüft                                        |
|              | Vorlage wird generiert                                       |
|              | Vorlage wird heruntergeladen                                 |

| U-0006       | Änderungen mitteilen                  |
| ------------ | ------------------------------------- |
| Vorbedingung | Angemeldet                            |
| Schritte     | Admin bestätigt Vorlage               |
|              | Vorlage wird als `Bestätigt` markiert |
|              | Nutzer erhält eine Email              |

| U-0007       | Mitteilungen abbestellen          |
| ------------ | --------------------------------- |
| Vorbedingung | Angemeldet                        |
| Schritte     | Nutzer öffnet das Dashboard       |
|              | Klickt auf `Profil`               |
|              | Stellt die Benachrichtigungen aus |
|              | Speichert die Änderungen          |
|              | Erstellt eine neue Vorlage        |
|              | Vorlage wird von Admin bestätigt  |
|              | Nutzer erhält keine Mitteilung    |

## Admin

| A-0001       | Vorlage bestätigen                                        |
| ------------ | --------------------------------------------------------- |
| Vorbedingung | Als Admin angemeldet & Vorlage erstellt                   |
| Schritte     | Admin öffnet das Dashboard                                |
|              | Klickt auf das `Bestätigen`-Symbol in der Vorlagenansicht |
|              | Blättert durch die Vorlage durch                          |
|              | Bestätigt die Vorlage                                     |
|              | Vorlage wird als `Bestätigt` markiert                     |

| A-0002       | Vorlage ablehnen                                          |
| ------------ | --------------------------------------------------------- |
| Vorbedingung | Als Admin angemeldet & Vorlage erstellt                   |
| Schritte     | Admin öffnet das Dashboard                                |
|              | Klickt auf das `Bestätigen`-Symbol in der Vorlagenansicht |
|              | Blättert durch die Vorlage durch                          |
|              | Schreibt einen Kommentar                                  |
|              | Ablehnt die Vorlage                                       |
|              | Vorlage wird als `Abgelehnt` markiert                     |

| A-0003       | Logs einsehen              |
| ------------ | -------------------------- |
| Vorbedingung | Als Admin angemeldet       |
| Schritte     | Admin öffnet das Dashboard |
|              | Klickt auf `Logs`          |
|              | Logs werden angezeigt      |

## Testfälle

Ein Testfall beschreibt eine elementare Funktionalität, welche getestet werden soll. Er hat eine Beschreibung und eine Voraussetzung. Die Voraussetzung ist eine Bedingung, die erfüllt sein muss, damit der Testfall ausgeführt werden kann. Die Schritte zum Ausführen werden auch mitgegeben, damit es zu keinen Missverständnissen kommt. Aus diesem Grund müssen diese Schritte exakt ausgeführt werden.

-   Beschreiben konkret, welcher Button wie/wann/was auslösen soll oder eben nicht
-   Testfälle sind Subformen von Testszenarios. Szenarien beziehen sich auf Anforderungen.
