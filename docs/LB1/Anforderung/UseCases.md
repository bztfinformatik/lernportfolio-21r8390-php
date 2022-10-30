---
tags:
    - LB1
    - Anforderung
---

# Use Cases

Ein Use Case ist eine kurze Beschreibung **was** ein System leisten soll. Der Vorgang wie das System die Aufgabe erfüllt ist nicht relevant. Ein Use Case beschreibt die Interaktion zwischen einem Akteur und dem System. Ein Use Case ist eine Sammlung von Anforderungen. Durch die Beschreibung der **erforderlichen Schnittstellen** wird klar, was für Systeme programmiert werden müssen, damit er umgesetzt werden kann. Durch die **Nummerierung** der Use Cases ist klar, welche Anforderungen zu welchem Use Case gehören und können somit untereinander verlinkt werden. Ein Use Case hat Bedingungen, welche vor und danach passieren, damit er als ausgeführt gilt. Ein Use Case kann mehrere [Akteure](Akteure.md) haben, welche unterschiedliche Rollen haben und ihn ausführen. Die Use Cases wurden in mehrere **Kategorien** eingeteilt, um die Übersichtlichkeit zu verbessern. In jeder Kategorie beginnt die Nummerierung neu.

???+ abstract "TL;DR"

    -   Kurz-Beschreibung was ein System leisten soll (und nicht wie)
    -   Beinhaltet die Beschreibung von erforderlichen Schnittstellen/Systeme
    -   Werden durchnummeriert
    -   Hat [Akteure](Akteure.md), Auslöser, Vorbedingungen und Nachbedingungen
    -   Können auf andere Use-Cases verweisen

## Start

![Start Use-Cases](https://www.plantuml.com/plantuml/svg/RP31JeH038RlynGD5vS32GB73TdDwis3aUYzGdUsOHWsCqKZnZVpveivP0Dc3JqrVx-_pT-T5tGoT0QYQkhWsLDoG4y-Ki9YQ4KtT1IG7Xphaq33ZchXtYhViZsZmmxEMBUegPAFi60QezM6bBg1VIiqE59OI-_WWKxEiDNJv8vH1s-d5XwYlwFmgI3KveaqUt5CZcmCw65J9McQtiQmtLwwihoGznsoWJToVEJnFvyjV3RpUzkHQQweVA7ocNf4xz_xy8znS3_VTUj9nYjFiNYAuFcQahsGUsNR35QJdPQeEJOaIRa4M5EpLJLVLOjOxIXSwSml "Start Use-Cases"){width=100% loading=lazy}

### S-0001

| ID/Bezeichnung       | S-0001                                        |
| -------------------- | --------------------------------------------- |
| Name                 | Registrieren                                  |
| Ziel                 | Ein Nutzer möchte einen neuen Account anlegen |
| Schnittstellen       | Datenbank, Mailversand                        |
| Akteure              | [Lehrling](Akteure.md#lehrling)               |
| Trigger              | Registrierseite                               |
| Vorbedingungen       | Kein Account mit dieser Email                 |
| Nachbedingungen      | [S-0002](#s-0002)                             |
| Essentielle Schritte | 1. Registrierung öffnen                       |
|                      | 2. Anmeldedaten eingeben                      |
|                      | 3. Formular absenden                          |
|                      | 4. Account anlegen                            |

### S-0002

| ID/Bezeichnung  | S-0002                                                     |
| --------------- | ---------------------------------------------------------- |
| Name            | Email verifizieren                                         |
| Ziel            | Account als gültig markieren (Datenbank vor Bots schützen) |
| Schnittstellen  | Datenbank                                                  |
| Akteure         | [Lehrling](Akteure.md#lehrling)                            |
| Trigger         | [S-0001](#s-0001)                                          |
| Vorbedingungen  | Registriert                                                |
| Nachbedingungen | Anmeldung möglich                                          |
| Schritte        | 1. Email erhalten                                          |
|                 | 2. Bestätigungslink klicken                                |
|                 | 3. Account als verifiziert markieren                       |

### S-0003

| ID/Bezeichnung  | S-003                                              |
| --------------- | -------------------------------------------------- |
| Name            | Anmelden                                           |
| Ziel            | Ein Nutzer möchte sich mit seinem Account anmelden |
| Schnittstellen  | Datenbank                                          |
| Akteure         | [Lehrling](Akteure.md#lehrling)                    |
| Trigger         | Anmeldeseite                                       |
| Vorbedingungen  | [S-0002](#s-0002)                                  |
| Nachbedingungen |                                                    |
| Schritte        | 1. Anmeldeseite öffnen                             |
|                 | 2. Anmeldedaten eingeben                           |
|                 | 3. Formular absenden                               |
|                 | 4. Zur Übersicht navigieren                        |

### S-0004

| ID/Bezeichnung  | S-004                                                 |
| --------------- | ----------------------------------------------------- |
| Name            | Passwort zurücksetzen                                 |
| Ziel            | Ein Nutzer kann sein vergessenes Passwort neu setzten |
| Schnittstellen  | Mailversand                                           |
| Akteure         | [Lehrling](Akteure.md#lehrling)                       |
| Trigger         | Passwort vergessen                                    |
| Vorbedingungen  | [S-0002](#s-0002), Account vorhanden                  |
| Nachbedingungen |                                                       |
| Schritte        | 1. Anmeldeseite öffnen                                |
|                 | 2. "Passwort vergessen"-Klicken                       |
|                 | 3. Email zur Neusetzung senden                        |
|                 | 4. Passwort neu setzen                                |

---

## User

![User Use-Cases](https://www.plantuml.com/plantuml/svg/XT5BReCm40RWlKynogPXWPII1vieIjGigwfIbEm7c80LOqVseAgjUfkUeHV8nGfDS4EAL1O83zy_6jjBnsYvAXKCjeuirA_m0HsvWM39YlwM5UqPs82LUS6GIKifIwE5EqXzH8ib734zO4uRVgtppM_KkI8Xxc1rOAei2KpPM7YamYgfyyjobPLIDsejCQ_xbC9dVwQu303l0kfdk4PN90Pj1gZVIEQa0q07msqu6etk0vZFpr-BnTa_MxEN2X92cv3a3eyyZrh-H1N1pbXLx-HAZhqSj_A2-ZjFl9_SUdNwScdHqLElfxSwCozQ6SmwVkRzhFKRHgxSwLDdP2kTGocPIQfEBFQnk8vzD6U-8vj8dTK9qaqVqLuEXE727whuFTqmR2-iHqQjZFwJuw2lEkcjJdkhiw2tSToE45-FiAHwZwNw1W00 "User Use-Cases"){width=100% loading=lazy}

### U-0001

| ID/Bezeichnung  | U-0001                                                     |
| --------------- | ---------------------------------------------------------- |
| Name            | Dashboard anzeigen                                         |
| Ziel            | Eine Übersicht für die erstellten Vorlagen erlangen        |
| Schnittstellen  | Datenbank                                                  |
| Akteure         | [Lehrling](Akteure.md#lehrling), [Admin](Akteure.md#admin) |
| Trigger         | Übersichtseite öffnen                                      |
| Vorbedingungen  | Angemeldet                                                 |
| Nachbedingungen | Titel, Beschreibung, Status sichtbar                       |
| Schritte        | 1. Dashboard öffnen                                        |

### U-0002

| ID/Bezeichnung  | U-0002                                                     |
| --------------- | ---------------------------------------------------------- |
| Name            | Profil bearbeiten                                          |
| Ziel            | Änderungen am                                              |
| Schnittstellen  | Datenbank                                                  |
| Akteure         | [Lehrling](Akteure.md#lehrling), [Admin](Akteure.md#admin) |
| Trigger         | Nutzer ändert seine Email oder sein Passwort               |
| Vorbedingungen  | Account existiert                                          |
| Nachbedingungen |                                                            |
| Schritte        | 1. Dashboard öffnen                                        |
|                 | 2. Zu Profil navigieren                                    |
|                 | 3. Änderungen eingeben                                     |
|                 | 4. Änderungen speichern                                    |

### U-0003

| ID/Bezeichnung  | U-0003                                      |
| --------------- | ------------------------------------------- |
| Name            | Neue Vorlage                                |
| Ziel            | Ein neues Projekt zur Bestätigung erstellen |
| Schnittstellen  | Datenbank                                   |
| Akteure         | [Lehrling](Akteure.md#lehrling)             |
| Trigger         | Ein neues Projekt wird begonnen             |
| Vorbedingungen  |                                             |
| Nachbedingungen | [A-0001](#a-0001), [A-0002](#a-0002)        |
| Schritte        | 1. Dashboard öffnen                         |
|                 | 2. "Neues Projekt"-Knopf klicken            |
|                 | 3. Allgemeine Daten eingeben                |
|                 | 4. Aussehen anpassen                        |
|                 | 5. Ordnerstruktur erstellen                 |
|                 | 6. Projekt zur überprüfung abgeben          |

### U-0004

| ID/Bezeichnung  | U-0004                                |
| --------------- | ------------------------------------- |
| Name            | Vorlage bearbeiten                    |
| Ziel            | Eine bestehende Vorlage bearbeiten    |
| Schnittstellen  | Datenbank                             |
| Akteure         | [Lehrling](Akteure.md#lehrling)       |
| Trigger         | Projekt abgelehnt / Anpassungen nötig |
| Vorbedingungen  | [U-0003](#u-0003)                     |
| Nachbedingungen | [A-0001](#a-0001), [A-0002](#a-0002)  |
| Schritte        | 1. Dashboard öffnen                   |
|                 | 2. Bearbeiten-Knopf klicken           |
|                 | 3. Informationen ändern               |
|                 | 4. Projekt zur überprüfung abgeben    |

### U-0005

| ID/Bezeichnung  | U-0005                          |
| --------------- | ------------------------------- |
| Name            | Vorlage löschen                 |
| Ziel            | Eine bestehende Vorlage löschen |
| Schnittstellen  | Datenbank                       |
| Akteure         | [Lehrling](Akteure.md#lehrling) |
| Trigger         | Ein Projekt wurde beendet       |
| Vorbedingungen  | [U-0003](#u-0003)               |
| Nachbedingungen |                                 |
| Schritte        | 1. Dashboard öffnen             |
|                 | 2. Löschen-Knopf klicken        |
|                 | 3. Löschen bestätigen           |

### U-0006

| ID/Bezeichnung  | U-0006                                       |
| --------------- | -------------------------------------------- |
| Name            | Vorlage downloaden                           |
| Ziel            | Die Vorlage für die Verwendung herunterladen |
| Schnittstellen  |                                              |
| Akteure         | [Lehrling](Akteure.md#lehrling)              |
| Trigger         | [A-0001](#a-0001)                            |
| Vorbedingungen  | [A-0001](#a-0001)                            |
| Nachbedingungen |                                              |
| Schritte        | 1. Dashboard öffnen                          |
|                 | 2. Download-Knopf klicken                    |
|                 | 3. Vorlage herunterladen                     |

### U-0007

| ID/Bezeichnung  | U-0007                                                     |
| --------------- | ---------------------------------------------------------- |
| Name            | Statusänderung mitteilen                                   |
| Ziel            | Der Nutzer möchte wissen, wenn ein Admin den Status ändert |
| Schnittstellen  | Mailversand                                                |
| Akteure         | [Lehrling](Akteure.md#lehrling), [Admin](Akteure.md#admin) |
| Trigger         | [A-0001](#a-0001), [A-0002](#a-0002)                       |
| Vorbedingungen  |                                                            |
| Nachbedingungen |                                                            |
| Schritte        | 1. Admin ändert Status                                     |
|                 | 2. Benutzer informieren                                    |

---

## Admin

![Admin Use-Cases](https://www.plantuml.com/plantuml/svg/RP0zRiCm38LtdOBmaCQ30TTU0oD6EdOBcfss6PcmVWA97egYj-bDUh7A3UesI3aHJ-zzVD0-2WQPhO6i7ImxU8bK731Ip9Im6Ff7DtGM40-1zIWmSA1Us3iL9tON36ZXWls4cexocW3BCpfjIAa7Q2UXEP32Ndo0R_GYFp7g5BHgDKFsUn7U5AJPddmm2GiTHVdy4DRaSi08sxOeo_8nXztkkZNDRG0xGwExSLUhk_fnFtiT8T983ZPmPYCK_YRgDL6dnFjI-qIXOpVCBZLP4EhwLqNHh9tkfEfUgdErfuInvWi0 "Admin Use-Cases"){width=100% loading=lazy}

### A-0001

| ID/Bezeichnung  | A-0001                                                            |
| --------------- | ----------------------------------------------------------------- |
| Name            | Vorlage bestätigen                                                |
| Ziel            | Die Vorlage als gültig Markieren, damit sie verwendet werden kann |
| Schnittstellen  | Datenbank                                                         |
| Akteure         | [Admin](Akteure.md#admin)                                         |
| Trigger         | [U-0003](#u-0003)                                                 |
| Vorbedingungen  | Vorlage zur Bestätigung abgegeben, Als Admin angemeldet           |
| Nachbedingungen | [U-0006](#u-0006), [U-0007](#u-0007)                              |
| Schritte        | 1. Dashboard öffnen                                               |
|                 | 2. Bestätigungsknopf drücken                                      |
|                 | 3. Vorlage durchblättern                                          |
|                 | 4. Kommentar schreiben                                            |
|                 | 5. Als gültig markieren                                           |

### A-0002

| ID/Bezeichnung  | A-0002                                                                   |
| --------------- | ------------------------------------------------------------------------ |
| Name            | Vorlage ablehnen                                                         |
| Ziel            | Die Vorlage als ungültig Markieren, damit sie nochmals überarbeitet wird |
| Schnittstellen  | Datenbank                                                                |
| Akteure         | [Admin](Akteure.md#admin)                                                |
| Trigger         | [U-0003](#u-0003)                                                        |
| Vorbedingungen  | Vorlage zur Bestätigung abgegeben, Als Admin angemeldet                  |
| Nachbedingungen | Download nicht möglich, [U-0007](#u-0007)                                |
| Schritte        | 1. Dashboard öffnen                                                      |
|                 | 2. Bestätigungsknopf drücken                                             |
|                 | 3. Vorlage durchblättern                                                 |
|                 | 4. Kommentar schreiben                                                   |
|                 | 5. Als ungültig markieren                                                |

### A-0003

| ID/Bezeichnung  | A-0003                                                                                    |
| --------------- | ----------------------------------------------------------------------------------------- |
| Name            | Logs sehen & filtern                                                                      |
| Ziel            | Der Admin möchte gerne sehen, wie sich das Programm verhält und ob es Abnormalitäten gibt |
| Schnittstellen  | Kibana                                                                                    |
| Akteure         | [Admin](Akteure.md#admin)                                                                 |
| Trigger         | Benutzer meldet einen Absturz beim Admin                                                  |
| Vorbedingungen  | Als Admin angemeldet                                                                      |
| Nachbedingungen |                                                                                           |
| Schritte        | 1. Kibana öffnen                                                                          |
|                 | 2. Filter setzen                                                                          |
|                 | 3. Suchen                                                                                 |
