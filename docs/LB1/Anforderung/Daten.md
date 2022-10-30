---
tags:
    - LB1
    - Anforderung
---

# Daten

Die Daten, welche übertrag werden müssen **validiert** werden. Was für Validation für die einzelnen Daten benötigt sind wird hier beschrieben. Die Felder entsprechen den aus dem [Klassendiagramm](../Architekturkonzept/MVC-Konzept.md), welches im Konzept zu finden ist. Selbstverständlich werden alle Strings **gekürzt** und vor **XSS** und **SQL-Injection** geschützt. Dies wurde jedoch zur Steigerung der Übersicht nicht vermerkt. Es wird nach folgenden Kriterien validiert:

-   Analyse der Daten welche übertragen/erfasst werden
    -   Spezifikation
    -   Datentypen
    -   Spezialfälle
    -   Fehlerfälle
    -   Wertebereich

## User

| :fontawesome-solid-shield-halved: | Id             |
| --------------------------------- | -------------- |
| Datentyp                          | int            |
| Spezialfälle                      | Einzigartig    |
| Fehlerfälle                       | Negativ oder 0 |
| Wertebereich                      | 1 - ..         |

| :fontawesome-solid-shield-halved: | Name           |
| --------------------------------- | -------------- |
| Datentyp                          | String         |
| Spezialfälle                      | Einzigartig    |
| Fehlerfälle                       | Leer           |
| Wertebereich                      | 2 - 35 Zeichen |

| :fontawesome-solid-shield-halved: | Email                                       |
| --------------------------------- | ------------------------------------------- |
| Datentyp                          | String                                      |
| Spezialfälle                      | Einzigartig                                 |
| Fehlerfälle                       | Leer, ohne `@`, keine Domain, Sonderzeichen |
| Wertebereich                      | 2 - 35 Zeichen                              |

| :fontawesome-solid-shield-halved: | Passwort                                                    |
| --------------------------------- | ----------------------------------------------------------- |
| Datentyp                          | String                                                      |
| Spezialfälle                      | Hashed gespeichert                                          |
| Fehlerfälle                       | Leer, keine Sonderzeichen / Klein-Gross-Buchstaben, Nummern |
| Wertebereich                      | 12 - 255 Zeichen                                            |

| :fontawesome-solid-shield-halved: | Salt                    |
| --------------------------------- | ----------------------- |
| Datentyp                          | String                  |
| Spezialfälle                      | Einzigartig pro User    |
| Fehlerfälle                       | Leer, Passwort ungültig |
| Wertebereich                      | Base64                  |

| :fontawesome-solid-shield-halved: | Created_At         |
| --------------------------------- | ------------------ |
| Datentyp                          | DateTime           |
| Spezialfälle                      |                    |
| Fehlerfälle                       | Vor heutigem Datum |
| Wertebereich                      | 2000 +- heute      |

| :fontawesome-solid-shield-halved: | ProfilePicture       |
| --------------------------------- | -------------------- |
| Datentyp                          | String               |
| Spezialfälle                      |                      |
| Fehlerfälle                       | Leer                 |
| Wertebereich                      | Base64, 700 kb gross |

| :fontawesome-solid-shield-halved: | Verified          |
| --------------------------------- | ----------------- |
| Datentyp                          | bool              |
| Spezialfälle                      | nicht Verifiziert |
| Fehlerfälle                       |                   |
| Wertebereich                      | `true` / `false`  |

| :fontawesome-solid-shield-halved: | Role             |
| --------------------------------- | ---------------- |
| Datentyp                          | Json             |
| Spezialfälle                      |                  |
| Fehlerfälle                       | Leer             |
| Wertebereich                      | `admin` / `user` |

## Projekt

| :fontawesome-solid-shield-halved: | Id          |
| --------------------------------- | ----------- |
| Datentyp                          | UUID        |
| Spezialfälle                      | Einzigartig |
| Fehlerfälle                       | Leer        |
| Wertebereich                      |             |

| :fontawesome-solid-shield-halved: | Owner |
| --------------------------------- | ----- |
| Datentyp                          | User  |
| Spezialfälle                      |       |
| Fehlerfälle                       | Null  |
| Wertebereich                      | User  |

| :fontawesome-solid-shield-halved: | Name                 |
| --------------------------------- | -------------------- |
| Datentyp                          | String               |
| Spezialfälle                      | Einzigartig pro User |
| Fehlerfälle                       | Leer                 |
| Wertebereich                      | 2 - 60 Zeichen       |

| :fontawesome-solid-shield-halved: | Description      |
| --------------------------------- | ---------------- |
| Datentyp                          | String           |
| Spezialfälle                      |                  |
| Fehlerfälle                       | Leer             |
| Wertebereich                      | 10 - 255 Zeichen |

| :fontawesome-solid-shield-halved: | Created_At       |
| --------------------------------- | ---------------- |
| Datentyp                          | DateTime         |
| Spezialfälle                      | Bereits erstellt |
| Fehlerfälle                       | Nicht heute      |
| Wertebereich                      | heute            |

| :fontawesome-solid-shield-halved: | Updated_At  |
| --------------------------------- | ----------- |
| Datentyp                          | DateTime    |
| Spezialfälle                      |             |
| Fehlerfälle                       | Nicht jetzt |
| Wertebereich                      | Jetzt       |

| :fontawesome-solid-shield-halved: | From_Date    |
| --------------------------------- | ------------ |
| Datentyp                          | DateTime     |
| Spezialfälle                      |              |
| Fehlerfälle                       | Vor To_Date  |
| Wertebereich                      | Nach To_Date |

| :fontawesome-solid-shield-halved: | To_Date        |
| --------------------------------- | -------------- |
| Datentyp                          | DateTime       |
| Spezialfälle                      |                |
| Fehlerfälle                       | Vor From_Date  |
| Wertebereich                      | Nach From_Date |

| :fontawesome-solid-shield-halved: | Docs_Repo     |
| --------------------------------- | ------------- |
| Datentyp                          | String        |
| Spezialfälle                      |               |
| Fehlerfälle                       | Leer          |
| Wertebereich                      | 0 .. 100, URL |

| :fontawesome-solid-shield-halved: | Source_Repo   |
| --------------------------------- | ------------- |
| Datentyp                          | String        |
| Spezialfälle                      |               |
| Fehlerfälle                       | Leer          |
| Wertebereich                      | 0 .. 100, URL |

| :fontawesome-solid-shield-halved: | Want_Readme      |
| --------------------------------- | ---------------- |
| Datentyp                          | bool             |
| Spezialfälle                      |                  |
| Fehlerfälle                       |                  |
| Wertebereich                      | `true` / `false` |

| :fontawesome-solid-shield-halved: | Want_ignore      |
| --------------------------------- | ---------------- |
| Datentyp                          | bool             |
| Spezialfälle                      |                  |
| Fehlerfälle                       |                  |
| Wertebereich                      | `true` / `false` |

| :fontawesome-solid-shield-halved: | Want_CSS         |
| --------------------------------- | ---------------- |
| Datentyp                          | bool             |
| Spezialfälle                      |                  |
| Fehlerfälle                       |                  |
| Wertebereich                      | `true` / `false` |

| :fontawesome-solid-shield-halved: | Want_JS          |
| --------------------------------- | ---------------- |
| Datentyp                          | bool             |
| Spezialfälle                      |                  |
| Fehlerfälle                       |                  |
| Wertebereich                      | `true` / `false` |

| :fontawesome-solid-shield-halved: | Want_Pages       |
| --------------------------------- | ---------------- |
| Datentyp                          | bool             |
| Spezialfälle                      |                  |
| Fehlerfälle                       |                  |
| Wertebereich                      | `true` / `false` |

| :fontawesome-solid-shield-halved: | Color      |
| --------------------------------- | ---------- |
| Datentyp                          | Color Enum |
| Spezialfälle                      |            |
| Fehlerfälle                       | Leer       |
| Wertebereich                      | Enum Werte |

| :fontawesome-solid-shield-halved: | Font |
| --------------------------------- | ---- |
| Datentyp                          | Font |
| Spezialfälle                      |      |
| Fehlerfälle                       | Leer |
| Wertebereich                      | Font |

| :fontawesome-solid-shield-halved: | Logo                             |
| --------------------------------- | -------------------------------- |
| Datentyp                          | String                           |
| Spezialfälle                      |                                  |
| Fehlerfälle                       | Leer, kein SVG / PNG / JPG / GIF |
| Wertebereich                      | Base64, 500kb                    |

| :fontawesome-solid-shield-halved: | Want_Journal     |
| --------------------------------- | ---------------- |
| Datentyp                          | bool             |
| Spezialfälle                      |                  |
| Fehlerfälle                       |                  |
| Wertebereich                      | `true` / `false` |

| :fontawesome-solid-shield-halved: | Want_Exampes     |
| --------------------------------- | ---------------- |
| Datentyp                          | bool             |
| Spezialfälle                      |                  |
| Fehlerfälle                       |                  |
| Wertebereich                      | `true` / `false` |

| :fontawesome-solid-shield-halved: | Structure     |
| --------------------------------- | ------------- |
| Datentyp                          | StructureNode |
| Spezialfälle                      |               |
| Fehlerfälle                       | Leer          |
| Wertebereich                      |               |

| :fontawesome-solid-shield-halved: | conrifmed        |
| --------------------------------- | ---------------- |
| Datentyp                          | bool             |
| Spezialfälle                      |                  |
| Fehlerfälle                       |                  |
| Wertebereich                      | `true` / `false` |

| :fontawesome-solid-shield-halved: | confirmed_by   |
| --------------------------------- | -------------- |
| Datentyp                          | User           |
| Spezialfälle                      | Admin gelöscht |
| Fehlerfälle                       | Leer           |
| Wertebereich                      |                |

| :fontawesome-solid-shield-halved: | confirmed_at    |
| --------------------------------- | --------------- |
| Datentyp                          | DateTime        |
| Spezialfälle                      |                 |
| Fehlerfälle                       | Null, Vor jetzt |
| Wertebereich                      | .. - Jetzt      |

| :fontawesome-solid-shield-halved: | Status      |
| --------------------------------- | ----------- |
| Datentyp                          | Status Enum |
| Spezialfälle                      |             |
| Fehlerfälle                       | Null        |
| Wertebereich                      | Enum Werte  |

| :fontawesome-solid-shield-halved: | download_link   |
| --------------------------------- | --------------- |
| Datentyp                          | String          |
| Spezialfälle                      | Nicht bestätigt |
| Fehlerfälle                       | Leer            |
| Wertebereich                      | 0 .. 100, URL   |

## StructureNode

| :fontawesome-solid-shield-halved: | Id    |
| --------------------------------- | ----- |
| Datentyp                          | UUID  |
| Spezialfälle                      |       |
| Fehlerfälle                       | Leer  |
| Wertebereich                      | ASCII |

| :fontawesome-solid-shield-halved: | Name                |
| --------------------------------- | ------------------- |
| Datentyp                          | String              |
| Spezialfälle                      |                     |
| Fehlerfälle                       | Leer, Sonderzeichen |
| Wertebereich                      | 0 .. 100, ASCII     |

| :fontawesome-solid-shield-halved: | Type            |
| --------------------------------- | --------------- |
| Datentyp                          | FolderType Enum |
| Spezialfälle                      |                 |
| Fehlerfälle                       | Leer            |
| Wertebereich                      | Enum Werte      |
