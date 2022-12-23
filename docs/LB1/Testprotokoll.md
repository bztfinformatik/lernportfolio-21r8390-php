# Testfälle :material-projector-screen-outline:

Ein Testfall beschreibt eine elementare **Funktionalität**, welche getestet werden soll. Er hat eine Beschreibung und eine Voraussetzung. Die Voraussetzung ist eine Bedingung, die erfüllt sein muss, damit der Testfall ausgeführt werden kann. Die Schritte zum Ausführen werden auch mitgegeben, damit es zu keinen Missverständnissen kommt. Aus diesem Grund müssen diese Schritte exakt ausgeführt werden.

Hier werden alle Testfälle, welche in diesem Projekt getestet werden müssen, festgehalten. Am Ende der Seite befindet sich ein [Protokoll](#testprotokoll) der Resultate.

Ich habe versucht End-To-End-Tests zu schreiben, jedoch ist dies mit **Containern** schwieriger und viel aufwändiger als ich dachte. Aus diesem Grund wird dies nicht mehr Teil der Abgabe sein, jedoch werde ich es in den Ferien noch versuchen. Ich habe bereits ein paar Tests geschrieben, welche aber nicht funktionieren.

## Allgemeine Testfälle

### Routing

| ID/Bezeichnung      | R-001                                                                         |
| ------------------- | ----------------------------------------------------------------------------- |
| Beschreibung        | Der Benutzer wird zur Startseite weitergeleitet, wenn er das Dashboard öffnet |
| Testvoraussetzung   | Nicht angemeldet                                                              |
| Testschritte        | Dashboard (_http://localhost:port/dashboard_) aufrufen                        |
| Erwartetes Ergebnis | Startseite wird angezeigt                                                     |

| ID/Bezeichnung      | R-002                                                                         |
| ------------------- | ----------------------------------------------------------------------------- |
| Beschreibung        | Der Benutzer wird zum Dashboard weitergeleitet, wenn er die Startseite öffnet |
| Testvoraussetzung   | Angemeldet                                                                    |
| Testschritte        | Basisurl (_http://localhost:port/_) aufrufen                                  |
| Erwartetes Ergebnis | Dashboard wird angezeigt                                                      |

| ID/Bezeichnung      | R-003                                                     |
| ------------------- | --------------------------------------------------------- |
| Beschreibung        | Unbekannter Controller zeigt 404-Seite an                 |
| Testvoraussetzung   |                                                           |
| Testschritte        | Unbekannte URL (_http://localhost:port/asdf123_) aufrufen |
| Erwartetes Ergebnis | 404-Seite anzeigen                                        |

| ID/Bezeichnung      | R-004                              |
| ------------------- | ---------------------------------- |
| Beschreibung        | Unbekannter Fehler                 |
| Testvoraussetzung   |                                    |
| Testschritte        | Redis / Logstash Container beenden |
|                     | Controller öffnen                  |
| Erwartetes Ergebnis | 500-Seite zeigt ohne Meldung an    |

| ID/Bezeichnung      | R-005                                         |
| ------------------- | --------------------------------------------- |
| Beschreibung        | Abgefangener Fehler                           |
| Testvoraussetzung   | Angemeldet                                    |
| Testschritte        | Datenbanktabelle löschen                      |
|                     | Dashboard öffnen                              |
| Erwartetes Ergebnis | 500-Seite zeigt selbstgeschriebene Meldung an |

| ID/Bezeichnung      | R-006                                     |
| ------------------- | ----------------------------------------- |
| Beschreibung        | Anmeldeseite sollte weiterleiten          |
| Testvoraussetzung   | Angemeldet                                |
| Testschritte        | Anmelden                                  |
|                     | Sign In & Sign Up öffnen                  |
| Erwartetes Ergebnis | Benutzer wird zu Dashboard weitergeleitet |

### Sign Up

| ID/Bezeichnung      | SU-001                                           |
| ------------------- | ------------------------------------------------ |
| Beschreibung        | Neuer Account anlegen                            |
| Testvoraussetzung   | Benutzer hat kein Account                        |
| Testschritte        | Sign Up-Seite öffnen                             |
|                     | Daten eingeben                                   |
|                     | Sign Up-Knopf klicken                            |
| Erwartetes Ergebnis | Account wird angelegt und (SU-002 / SU-003)      |
|                     | Popup für die Serifizierungsemail wird angezeigt |

| ID/Bezeichnung      | SU-002                                       |
| ------------------- | -------------------------------------------- |
| Beschreibung        | Bild als Base64-String speichern             |
| Testvoraussetzung   | JavaScript aktiviert & SU-001                |
| Testschritte        | Account anlegen                              |
|                     | Bild wird als Base64 an Controller übergeben |
| Erwartetes Ergebnis | Base64-String ist in Datenbank gespeichert   |

| ID/Bezeichnung      | SU-003                                     |
| ------------------- | ------------------------------------------ |
| Beschreibung        | Verifizierung Email                        |
| Testvoraussetzung   | SendGrid läuft & Limit nicht überschritten |
| Testschritte        | Account anlegen (SU-001)                   |
|                     | Email empfangen                            |
|                     | Link klicken                               |
|                     | Verifizierung wird bestätigt               |
| Erwartetes Ergebnis | Email wird versendet                       |
|                     | Name des Benutzer wird eingefügt           |
|                     | Verifizierungslink ist hinterlegt          |
|                     | Benutzer wird als Verifiziert markiert     |

| ID/Bezeichnung      | SU-004                                    |
| ------------------- | ----------------------------------------- |
| Beschreibung        | Ungültiger Verifizierungstoken            |
| Testvoraussetzung   | SU-003                                    |
| Testschritte        | Zeichen zu Verifizierungstoken hinzufügen |
|                     | Token in Controller einfügen              |
| Erwartetes Ergebnis | _Invalid Verification_ wird angezeigt     |

| ID/Bezeichnung      | SU-005                                  |
| ------------------- | --------------------------------------- |
| Beschreibung        | Email bereits verwendet                 |
| Testvoraussetzung   | Benutzer mit Email existiert bereits    |
| Testschritte        | Benutzer mit Email anlegen              |
|                     | Abmelden                                |
|                     | Neuer Benutzer mit selber Email anlegen |
| Erwartetes Ergebnis | Validierungsmeldung wird angezeigt      |

| ID/Bezeichnung      | SU-006                             |
| ------------------- | ---------------------------------- |
| Beschreibung        | Password mit Salt versehen         |
| Testvoraussetzung   | Datenbank läuft                    |
| Testschritte        | Sign Up-Seite öffnen               |
|                     | Daten eingeben                     |
|                     | Speichern                          |
|                     | In Datenbank nachschauen           |
| Erwartetes Ergebnis | Password wird mit Salt versehen    |
|                     | Salt ist für jeder Benutzer anders |

### Sign In

| ID/Bezeichnung      | SI-001                                     |
| ------------------- | ------------------------------------------ |
| Beschreibung        | Anmelden                                   |
| Testvoraussetzung   | Benutzer hat Account                       |
| Testschritte        | Sign In-Seite öffnen                       |
|                     | Daten eingeben                             |
|                     | Sign In-Knopf klicken                      |
| Erwartetes Ergebnis | Benutzer wird angemeldet                   |
|                     | Benutzer wird auf Dashboard weitergeleitet |

| ID/Bezeichnung      | SI-002                                           |
| ------------------- | ------------------------------------------------ |
| Beschreibung        | Anmelden mit falschen Daten                      |
| Testvoraussetzung   | Benutzer hat Account                             |
| Testschritte        | Sign In-Seite öffnen                             |
|                     | Falsche Daten eingeben                           |
|                     | Sign In-Knopf klicken                            |
| Erwartetes Ergebnis | Validierungsmeldung wird angezeigt               |
|                     | Benutzer wird nicht angemeldet                   |
|                     | Benutzer wird nicht auf Dashboard weitergeleitet |

| ID/Bezeichnung      | SI-003                                           |
| ------------------- | ------------------------------------------------ |
| Beschreibung        | Anmelden mit falschem Password                   |
| Testvoraussetzung   | Benutzer hat Account                             |
| Testschritte        | Sign In-Seite öffnen                             |
|                     | Falsches Password eingeben                       |
|                     | Sign In-Knopf klicken                            |
| Erwartetes Ergebnis | Validierungsmeldung wird angezeigt               |
|                     | Benutzer wird nicht angemeldet                   |
|                     | Benutzer wird nicht auf Dashboard weitergeleitet |
|                     | Passwortzurücksetzung wird angezeigt             |

| ID/Bezeichnung      | SI-004                                     |
| ------------------- | ------------------------------------------ |
| Beschreibung        | Passwort zurücksetzen                      |
| Testvoraussetzung   | Benutzer hat Account                       |
| Testschritte        | Passwort zurücksetzen                      |
|                     | Email empfangen                            |
|                     | Link klicken                               |
|                     | Neues Passwort eingeben                    |
|                     | Passwort zurücksetzen                      |
| Erwartetes Ergebnis | Passwort wird zurückgesetzt                |
|                     | Benutzer wird zur Anmeldung weitergeleitet |

### Profil bearbeiten

| ID/Bezeichnung      | P-001                             |
| ------------------- | --------------------------------- |
| Beschreibung        | Profil bearbeiten                 |
| Testvoraussetzung   | Benutzer hat Account & Angemeldet |
| Testschritte        | Profil bearbeiten                 |
|                     | Daten ändern                      |
|                     | Speichern                         |
| Erwartetes Ergebnis | Daten werden geändert             |

| ID/Bezeichnung      | P-002                                 |
| ------------------- | ------------------------------------- |
| Beschreibung        | Benachrichtigungen deaktivieren       |
| Testvoraussetzung   | Benutzer hat Account & Angemeldet     |
| Testschritte        | Profil bearbeiten                     |
|                     | Benachrichtigungen deaktivieren       |
|                     | Speichern                             |
|                     | Projektstatus ändern                  |
| Erwartetes Ergebnis | Benachrichtigungen werden deaktiviert |
|                     | Keine Email wird versendet            |

### Projekt anlegen

| ID/Bezeichnung      | PA-001                                     |
| ------------------- | ------------------------------------------ |
| Beschreibung        | Projekt anlegen                            |
| Testvoraussetzung   | Angemeldet                                 |
| Testschritte        | Projekt anlegen                            |
|                     | Generelle Daten eingeben                   |
|                     | Aussehen konfigurieren                     |
|                     | Struktur konfigurieren                     |
|                     | Speichern                                  |
| Erwartetes Ergebnis | Projekt wird angelegt                      |
|                     | Benutzer wird auf Dashboard weitergeleitet |
|                     | Projekt wird auf Dashboard angezeigt       |
|                     | Projekt hat den Status `in progress`       |

| ID/Bezeichnung      | PA-002                                           |
| ------------------- | ------------------------------------------------ |
| Beschreibung        | Projekt anlegen ohne Titel                       |
| Testvoraussetzung   | Angemeldet                                       |
| Testschritte        | Projekt anlegen                                  |
|                     | Generelle Daten eingeben                         |
|                     | Titel leer lassen                                |
|                     | Speichern                                        |
| Erwartetes Ergebnis | Validierungsmeldung wird angezeigt               |
|                     | Benutzer kann nicht zu nächstem Schritt wechseln |
|                     | Benutzer bleibt auf Projekt anlegen              |

| ID/Bezeichnung      | PA-003                                           |
| ------------------- | ------------------------------------------------ |
| Beschreibung        | Projekttitel mehrmals verwenden                  |
| Testvoraussetzung   | Angemeldet                                       |
| Testschritte        | Projekt anlegen (PA-001)                         |
|                     | Neues Projekt mit gleichem Titel verwenden       |
| Erwartetes Ergebnis | Validierungsmeldung wird angezeigt               |
|                     | Benutzer kann nicht zu nächstem Schritt wechseln |
|                     | Benutzer bleibt auf Projekt anlegen              |

| ID/Bezeichnung      | PA-004                                   |
| ------------------- | ---------------------------------------- |
| Beschreibung        | Projekttitel einzigartig pro Benutzer    |
| Testvoraussetzung   | Angemeldet                               |
| Testschritte        | Projekt anlegen (PA-001)                 |
|                     | Benutzer wechseln                        |
|                     | Neues Projekt mit gleichem Titel anlegen |
| Erwartetes Ergebnis | Projekt kann angelegt werden             |

| ID/Bezeichnung      | PA-005                             |
| ------------------- | ---------------------------------- |
| Beschreibung        | Struktur über Datei Viewer anlegen |
| Testvoraussetzung   | Angemeldet                         |
| Testschritte        | Projekt anlegen (PA-001)           |
|                     | Rechtsklick auf Datei Viewer       |
|                     | Neuer Ordner anlegen               |
|                     | Neuer Datei anlegen                |
|                     | Speichern                          |
| Erwartetes Ergebnis | Struktur wird angelegt             |

| ID/Bezeichnung      | PA-006                                  |
| ------------------- | --------------------------------------- |
| Beschreibung        | Datei kann keine Kinder haben           |
| Testvoraussetzung   | Angemeldet                              |
| Testschritte        | Projekt anlegen (PA-001)                |
|                     | Rechtsklick auf Datei Viewer            |
|                     | Neuer Datei anlegen                     |
|                     | Rechtsklick auf Datei Viewer            |
| Erwartetes Ergebnis | Ordner wird nicht als Auswahl angezeigt |

| ID/Bezeichnung      | PA-007                                |
| ------------------- | ------------------------------------- |
| Beschreibung        | Ordnername muss einzigartig sein      |
| Testvoraussetzung   | Angemeldet                            |
| Testschritte        | Projekt anlegen (PA-001)              |
|                     | Rechtsklick auf Datei Viewer          |
|                     | Neuer Ordner anlegen                  |
|                     | Neuer Ordner mit selbem Namen anlegen |
| Erwartetes Ergebnis | Ordner kann nicht gespeichert werden  |

| ID/Bezeichnung      | PA-008                               |
| ------------------- | ------------------------------------ |
| Beschreibung        | Projekt wird auf Dashboard angezeigt |
| Testvoraussetzung   | Angemeldet                           |
| Testschritte        | Projekt anlegen (PA-001)             |
|                     | Dashboard öffnen                     |
| Erwartetes Ergebnis | Projekt wird angezeigt               |

### Projekt bearbeiten

| ID/Bezeichnung      | PB-001                  |
| ------------------- | ----------------------- |
| Beschreibung        | Projekt bearbeiten      |
| Testvoraussetzung   | Angemeldet              |
| Testschritte        | Projekt bearbeiten      |
|                     | Titel ändern            |
|                     | Speichern               |
| Erwartetes Ergebnis | Projekt wird bearbeitet |
|                     | Projekt hat neuen Titel |

| ID/Bezeichnung      | PB-002                           |
| ------------------- | -------------------------------- |
| Beschreibung        | Status wird zurückgesetzt        |
| Testvoraussetzung   | Angemeldet                       |
| Testschritte        | Status ändern                    |
|                     | Speichern                        |
|                     | Projekt bearbeiten               |
|                     | Titel ändern                     |
|                     | Speichern                        |
| Erwartetes Ergebnis | Projekt hat Status `in progress` |

### Projekt löschen

| ID/Bezeichnung      | PL-001                             |
| ------------------- | ---------------------------------- |
| Beschreibung        | Projekt löschen bestätigen         |
| Testvoraussetzung   | Angemeldet                         |
| Testschritte        | Projekt löschen                    |
|                     | Bestätigen                         |
| Erwartetes Ergebnis | Projekt wird gelöscht              |
|                     | Bestätigungsmeldung wird angezeigt |

| ID/Bezeichnung      | PL-002                             |
| ------------------- | ---------------------------------- |
| Beschreibung        | Projekt löschen abbrechen          |
| Testvoraussetzung   | Angemeldet                         |
| Testschritte        | Projekt löschen                    |
|                     | Ablehnen                           |
| Erwartetes Ergebnis | Projekt bleibt bestehen            |
|                     | Bestätigungsmeldung wird angezeigt |

| ID/Bezeichnung      | PL-003                                     |
| ------------------- | ------------------------------------------ |
| Beschreibung        | Projekt nur von normalen Benutzern löschen |
| Testvoraussetzung   | Angemeldet & Admin                         |
| Testschritte        | Dashboard öffnen                           |
| Erwartetes Ergebnis | Löschknopf ist nicht sichtbar              |

### Bestätigen

| ID/Bezeichnung      | B-001                            |
| ------------------- | -------------------------------- |
| Beschreibung        | Projekt bestätigen               |
| Testvoraussetzung   | Angemeldet und ist Admin         |
| Testschritte        | Projekt bestätigen-Knopf klicken |
|                     | Status zu Akzeptiert ändern      |
|                     | Speichern                        |
| Erwartetes Ergebnis | Projekt wird bestätigt           |
|                     | Status wird auf `accepted`       |

| ID/Bezeichnung      | B-002                      |
| ------------------- | -------------------------- |
| Beschreibung        | Projekt ablehnen           |
| Testvoraussetzung   | Angemeldet und ist Admin   |
| Testschritte        | Projekt ablehnen           |
|                     | Status zu Abgelehnt        |
|                     | Speichern                  |
| Erwartetes Ergebnis | Projekt wird abgelehnt     |
|                     | Status wird auf `rejected` |

| ID/Bezeichnung      | B-003                                |
| ------------------- | ------------------------------------ |
| Beschreibung        | Daten können nicht bearbeitet werden |
| Testvoraussetzung   | Angemeldet und ist Admin             |
| Testschritte        | Projekt Bestätigung öffnen           |
|                     | Daten bearbeiten                     |
|                     | Speichern                            |
| Erwartetes Ergebnis | Daten werden nicht gespeichert       |
|                     | Felder sind deaktiviert              |

| ID/Bezeichnung      | B-004                                  |
| ------------------- | -------------------------------------- |
| Beschreibung        | Bestätigung nur für Admins möglich     |
| Testvoraussetzung   | Angemeldet und ist kein Admin          |
| Testschritte        | Projekt bearbeiten                     |
|                     | Bestätigung öffnen                     |
| Erwartetes Ergebnis | Dropdown ist nicht auswählbar          |
|                     | Kommentar kann nicht bearbeitet werden |

### Download

| ID/Bezeichnung      | D-001                                 |
| ------------------- | ------------------------------------- |
| Beschreibung        | Projekt als ZIP herunterladen         |
| Testvoraussetzung   | Angemeldet & Projekt anlegen (PA-001) |
| Testschritte        | Dashboard öffnen                      |
|                     | Download-Knopf klicken                |
| Erwartetes Ergebnis | ZIP-Datei wird heruntergeladen        |

| ID/Bezeichnung      | D-002                                   |
| ------------------- | --------------------------------------- |
| Beschreibung        | Projekt wird mit Daten befüllt          |
| Testvoraussetzung   | Angemeldet & Projekt anlegen (PA-001)   |
| Testschritte        | Dashboard öffnen                        |
|                     | Download-Knopf klicken                  |
| Erwartetes Ergebnis | ZIP-Datei wird heruntergeladen          |
|                     | ZIP-Datei enthält Daten                 |
|                     | Dateien sind anhand der Vorlage befüllt |

| ID/Bezeichnung      | D-003                                   |
| ------------------- | --------------------------------------- |
| Beschreibung        | Nur im Status `accepted` herunterladbar |
| Testvoraussetzung   | Angemeldet & Projekt anlegen (PA-001)   |
| Testschritte        | Status auf `rejected` setzten (B-002)   |
|                     | Dashboard öffnen                        |
| Erwartetes Ergebnis | Download-Knopf wird nicht angezeigt     |

### Admin Dashboard

| ID/Bezeichnung      | AD-001                                      |
| ------------------- | ------------------------------------------- |
| Beschreibung        | Option Kibana wird nur für Admins angezeigt |
| Testvoraussetzung   | Angemeldet & ist kein Admin                 |
| Testschritte        | Dashboard öffnen                            |
|                     | Klick auf Profilbild                        |
| Erwartetes Ergebnis | Option Kibana wird nicht angezeigt          |

| ID/Bezeichnung      | AD-002                                             |
| ------------------- | -------------------------------------------------- |
| Beschreibung        | Alle Projekte werden angezeigt                     |
| Testvoraussetzung   | Account erstellt                                   |
| Testschritte        | Projekt als normaler Benutzer erstellen            |
|                     | Account zu Admin wechseln                          |
|                     | Dashboard öffnen                                   |
| Erwartetes Ergebnis | Alle Projekte von allen Benutzern werden angezeigt |

### Allgemeines

| ID/Bezeichnung      | A-001                                              |
| ------------------- | -------------------------------------------------- |
| Beschreibung        | Logs werden für jede Aktion erstellt               |
| Testvoraussetzung   | Account existiert                                  |
| Testschritte        | Dashboard öffnen                                   |
|                     | Aktion durchführen                                 |
| Erwartetes Ergebnis | Logs werden erstellt                               |
|                     | Alle Logs werden in Datei gespeichert              |
|                     | Wichtige Logs werden in Elastic-Search gespeichert |

| ID/Bezeichnung      | A-002                            |
| ------------------- | -------------------------------- |
| Beschreibung        | Redis als Session speicher       |
| Testvoraussetzung   | Redis Container läuft            |
| Testschritte        | Anmelden                         |
|                     | Verbindung zu Redisserver öffnen |
|                     | Tabellen auslesen                |
| Erwartetes Ergebnis | Session ist in Redis gespeichert |

## Testprotokoll

###

| ID    | Status | Testdatum  | Tester        | Bemerkung |
| ----- | :----: | ---------- | ------------- | --------- |
| A-001 |   ✔️   | 23.12.2022 | M. Schumacher |           |
