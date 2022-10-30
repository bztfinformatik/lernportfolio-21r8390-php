---
tags:
    - LB1
    - Anforderung
---

# Funktionale Anforderungen

-   Beschreibung der Anforderungen
    -   Ableitung auf use Cases
-   Testszenarios formulieren für jede Anforderung

## Grundlegendes

Funktionale Anforderungen sind die Anforderungen, deren Umsetzung direkt der Zweckbestimmung des Produkts dienen. Sie sind spezifisch für dieses Produkt. Gleich wie die [Use Cases](UseCases.md) haben sie **Nummern** und sind **Kategorien** zugeordnet. Sie sind eine Ableitung aus den Use Cases.

```text title="Beispiel"
Die Software muss vor Passwörtern warnen, für die eine bekannte Kontraindikation enthalten.
```

## Start

| F-S-0001     | Registrieren                                                          |
| ------------ | --------------------------------------------------------------------- |
| Beschreibung | Die Software muss informieren, dass die Email bereits verwendet wird. |
| Use-Case     | [S-0001](UseCases.md#s-0001)                                          |

| F-S-0002     | Registrieren                                     |
| ------------ | ------------------------------------------------ |
| Beschreibung | Die Software darf nur Password-Hashes speichern. |
| Use-Case     | [S-0001](UseCases.md#s-0001)                     |

| F-S-0003     | Registrieren                                                            |
| ------------ | ----------------------------------------------------------------------- |
| Beschreibung | Die Software darf Mails zur Verifizierung nur an gültige Emails senden. |
| Use-Case     | [S-0001](UseCases.md#s-0001)                                            |

| F-S-0004     | Registrieren                                                               |
| ------------ | -------------------------------------------------------------------------- |
| Beschreibung | Die Registrierung darf nur erfolgen, wenn alle Felder gültig befüllt sind. |
| Use-Case     | [S-0001](UseCases.md#s-0001)                                               |

| F-S-0005     | Email verifizieren                                                               |
| ------------ | -------------------------------------------------------------------------------- |
| Beschreibung | Die Software muss eine Email zur Verifizierung an den Email des Benutzer senden. |
| Use-Case     | [S-0002](UseCases.md#s-0002)                                                     |

| F-S-0006     | Email verifizieren                                                      |
| ------------ | ----------------------------------------------------------------------- |
| Beschreibung | Die Software darf Mails zur Verifizierung nur an gültige Emails senden. |
| Use-Case     | [S-0002](UseCases.md#s-0002)                                            |

| F-S-0007     | Anmelden                                                             |
| ------------ | -------------------------------------------------------------------- |
| Beschreibung | Die Anmeldung darf nur möglich sein, wenn die Email verifiziert ist. |
| Use-Case     | [S-0003](UseCases.md#s-0003)                                         |

| F-S-0008     | Anmelden                                                                    |
| ------------ | --------------------------------------------------------------------------- |
| Beschreibung | Bei der Anmeldung müssen die Eingaben mit der Datenbank abgeglichen werden. |
| Use-Case     | [S-0003](UseCases.md#s-0003)                                                |

| F-S-0009     | Anmelden                                                   |
| ------------ | ---------------------------------------------------------- |
| Beschreibung | Die Anmeldung darf nur mit gültigen Anmeldedaten erfolgen. |
| Use-Case     | [S-0003](UseCases.md#s-0003)                               |

| F-S-0009     | Anmelden                                                   |
| ------------ | ---------------------------------------------------------- |
| Beschreibung | Die Anmeldung darf nur mit gültigen Anmeldedaten erfolgen. |
| Use-Case     | [S-0003](UseCases.md#s-0003)                               |

| F-S-0010     | Passwort zurücksetzen                        |
| ------------ | -------------------------------------------- |
| Beschreibung | Der Benutzer kann sein Passwort zurücksetzen |
| Use-Case     | [S-0004](UseCases.md#s-0004)                 |

## User

| F-U-0001     | Dashboard anzeigen                                           |
| ------------ | ------------------------------------------------------------ |
| Beschreibung | Die Vorlagen des Benutzers werden aus der Datenbank geladen. |
| Use-Case     | [U-0001](UseCases.md#u-0001)                                 |

| F-U-0002     | Profil bearbeiten                                            |
| ------------ | ------------------------------------------------------------ |
| Beschreibung | Das Formular überprüft, ob die Email bereits verwendet wird. |
| Use-Case     | [U-0002](UseCases.md#u-0002)                                 |

| F-U-0002     | Profil bearbeiten                                                    |
| ------------ | -------------------------------------------------------------------- |
| Beschreibung | Das Profilbild wird in einer Base64String-Repräsentation gespeichert |
| Use-Case     | [U-0002](UseCases.md#u-0002)                                         |

| F-U-0003     | Neue Vorlage                                                       |
| ------------ | ------------------------------------------------------------------ |
| Beschreibung | Die Software überprüft, ob der Projektname bereits verwendet wird. |
| Use-Case     | [U-0003](UseCases.md#u-0003)                                       |

| F-U-0004     | Neue Vorlage                                                                             |
| ------------ | ---------------------------------------------------------------------------------------- |
| Beschreibung | Die neue Vorlage darf nur gespeichert werden, wenn alle Felder ausgefüllt & gültig sind. |
| Use-Case     | [U-0003](UseCases.md#u-0003)                                                             |

| F-U-0005     | Vorlage bearbeiten                                                                  |
| ------------ | ----------------------------------------------------------------------------------- |
| Beschreibung | Die Vorlage darf nur gespeichert werden, wenn alle Felder ausgefüllt & gültig sind. |
| Use-Case     | [U-0004](UseCases.md#u-0004)                                                        |

| F-U-0006     | Vorlage bearbeiten                                                                  |
| ------------ | ----------------------------------------------------------------------------------- |
| Beschreibung | Die Vorlage muss nach der Bearbeitung wieder auf den Status `Offen` gesetzt werden. |
| Use-Case     | [U-0004](UseCases.md#u-0004)                                                        |

| F-U-0007     | Vorlage bearbeiten                                   |
| ------------ | ---------------------------------------------------- |
| Beschreibung | Die Vorlage darf nur vom Lehrling bearbeitet werden. |
| Use-Case     | [U-0004](UseCases.md#u-0004)                         |

| F-U-0008     | Vorlage löschen                                    |
| ------------ | -------------------------------------------------- |
| Beschreibung | Die Vorlage darf nur vom Lehrling gelöscht werden. |
| Use-Case     | [U-0005](UseCases.md#u-0005)                       |

| F-U-0009     | Vorlage löschen                                                     |
| ------------ | ------------------------------------------------------------------- |
| Beschreibung | Das Löschen muss durch eine Abfrage beim Lehrling bestätigt werden. |
| Use-Case     | [U-0005](UseCases.md#u-0005)                                        |

| F-U-0010     | Vorlage downloaden                                                               |
| ------------ | -------------------------------------------------------------------------------- |
| Beschreibung | Die Vorlage darf nur heruntergeladen werden, wenn sie im Status `Bestätigt` ist. |
| Use-Case     | [U-0006](UseCases.md#u-0006)                                                     |

| F-U-0011     | Vorlage downloaden                                               |
| ------------ | ---------------------------------------------------------------- |
| Beschreibung | Die Struktur der Vorlage wird anhand der Konfiguration erstellt. |
| Use-Case     | [U-0006](UseCases.md#u-0006)                                     |

| F-U-0012     | Statusänderung mitteilen                                                      |
| ------------ | ----------------------------------------------------------------------------- |
| Beschreibung | Der Benutzer muss über eine Änderung des Statuses per Mail informiert werden. |
| Use-Case     | [U-0007](UseCases.md#u-0007)                                                  |

| F-U-0013     | Statusänderung mitteilen                                                       |
| ------------ | ------------------------------------------------------------------------------ |
| Beschreibung | Der Benutzer bekommt das Mail nur, wenn er die Benachrichtigung aktiviert hat. |
| Use-Case     | [U-0007](UseCases.md#u-0007)                                                   |

## Admin

| F-A-0001     | Vorlage bestätigen                                     |
| ------------ | ------------------------------------------------------ |
| Beschreibung | Die Vorlage darf nur von einem Admin bestätigt werden. |
| Use-Case     | [A-0001](UseCases.md#a-0001)                           |

| F-A-0002     | Vorlage ablehnen                                       |
| ------------ | ------------------------------------------------------ |
| Beschreibung | Die Vorlage darf nur von einem Admin abgelehnt werden. |
| Use-Case     | [A-0002](UseCases.md#a-0002)                           |

| F-A-0003     | Vorlage ablehnen                                           |
| ------------ | ---------------------------------------------------------- |
| Beschreibung | Die Vorlage darf nur mit einem Kommentar abgelehnt werden. |
| Use-Case     | [A-0002](UseCases.md#a-0002)                               |

| F-A-0004     | Logs sehen & filtern                                   |
| ------------ | ------------------------------------------------------ |
| Beschreibung | Die Logs dürfen nur von einem Admin eingesehen werden. |
| Use-Case     | [A-0003](UseCases.md#a-0003)                           |

| F-A-0005     | Logs sehen & filtern                              |
| ------------ | ------------------------------------------------- |
| Beschreibung | Die Software informiert über einen Systemabsturz. |
| Use-Case     | [A-0003](UseCases.md#a-0003)                      |
