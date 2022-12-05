---
tags:
    - PHP
    - Cheatsheet
---

# Regex

Regex ist eine Abkürzung für **Regular Expression**. Eine Regular Expression ist ein Muster, das verwendet wird, um strukturiert Text zu verarbeiten. Es ist eine sehr mächtige Sprache, die in vielen Programmiersprachen verwendet wird. In PHP wird es verwendet, um Text zu **suchen** und zu **ersetzen**, aber auch um zu **prüfen**, ob ein Text mit einem bestimmten Muster übereinstimmt.

## Regex Syntax

Ein Muster besteht aus normalen Zeichen und Metazeichen. Ein **Metazeichen** ist ein Zeichen, das eine spezielle Bedeutung hat. Wenn Sie ein Metazeichen in einem Muster verwenden möchten, muss es mit einem Backslash `\` voranstellen. Je nach Programmiersprache kann die Syntax für eine Regex variieren.

=== "PHP"

    ```php
    preg_match(pattern, subject, matches, flags, offset)
    ```

=== "C#"

    ```csharp
    Regex.Match(input, pattern)
    ```

=== "Java"

    ```java
    Pattern.matches(pattern, input)
    ```

=== "JavaScript"

    ```javascript
    input.match(pattern)
    ```

=== "Python"

    ```python
    re.match(pattern, string)
    ```

## Regex Beispiel

In diesem Beispiel wird ein Muster verwendet, um zu prüfen, ob eine URL gültig ist. Die URL muss mit `http://` oder `https://` beginnen, gefolgt von einem beliebigen Wort. Das Wort muss mit einem Buchstaben beginnen und darf nur Buchstaben, Zahlen und Unterstriche enthalten. Zudem muss es mit einem Punkt enden, gefolgt von `com`, `net`, `org` oder `de`.

```php
<?php
$pattern = "/^(http|https):\/\/[a-zA-Z][a-zA-Z0-9_]*\.(com|net|org|de)$/";
$subject = "https://example.com";

if (preg_match($pattern, $subject)) {
    echo "Die URL ist gültig.";
} else {
    echo "Die URL ist ungültig.";
}
```

## Regex Metazeichen

Um Muster zu erstellen können folgende Metazeichen verwendet werden:

| Metazeichen | Beschreibung                                       |
| :---------: | -------------------------------------------------- |
|     `.`     | ein beliebiges Zeichen                             |
|    `[]`     | ein beliebiges Zeichen aus dem angegebenen Bereich |
|     `^`     | Anfang des Textes                                  |
|     `$`     | Ende des Textes                                    |
|     `*`     | Null oder mehr Vorkommen des vorherigen Zeichens   |
|     `+`     | Eins oder mehr Vorkommen des vorherigen Zeichens   |
|     `?`     | Null oder eins Vorkommen des vorherigen Zeichens   |
|    `{n}`    | n Vorkommen des vorherigen Zeichens                |
|   `{n,}`    | n oder mehr Vorkommen des vorherigen Zeichens      |
|   `{n,m}`   | n und maximal m Vorkommen des vorherigen Zeichens  |
|    `()`     | Teile eines Musters zu gruppieren                  |
|    `\|`     | ODER                                               |

## Flags

Flags sind Optionen, die die Suche beeinflussen. So können gewisse Zeichen ignoriert werden, oder die Suche case-insensitive durchgeführt werden:

| Flag | Beschreibung                       |
| :--: | ---------------------------------- |
| `i`  | Ignoriert Gross- & Kleinschreibung |
| `m`  | Mehrzeilige Suche                  |
| `s`  | Sucht auch in mehreren Zeilen      |
| `x`  | Ignoriert Whitespace               |
| `u`  | UTF-8 Modus                        |

## Abkürzungen

Das Folgende sind einige Abkürzungen, die in Regex verwendet werden können:

| Abkürzung | Beschreibung                       |
| :-------: | ---------------------------------- |
|   `\d`    | Ziffern [0-9]                      |
|   `\D`    | Nicht Ziffer [^0-9]                |
|   `\s`    | Whitespace                         |
|   `\S`    | Nicht Whitespace                   |
|   `\w`    | Alphanumerisch [a-zA-Z0-9_]        |
|   `\W`    | Nicht Alphanumerisch [^a-za-z0-9_] |
