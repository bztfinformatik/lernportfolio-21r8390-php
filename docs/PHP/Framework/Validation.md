---
tags:
    - PHP
    - Framework
---

# Validation

Die Validation von Formularen ist ein wichtiger **Bestandteil** eines jeden Frameworks. In diesem Kapitel wird die Validation von unserem eigenen Framework vorgestellt. Die Validation passiert für jedes Formular einzeln und wird über [HTTP-Methoden](../Aufgaben/HTTP-Parameter.md) gesteuert.

## Controller

Im Controller wird **überprüft** ob das Formular angefragt wird oder validiert werden sollte. Wenn das Formular über `GET` angefragt wird, wird die View geladen und ein leeres Formular zurückgegeben. Wenn das Formular **validiert** werden soll, wird dies mit der HTTP-Methode `POST` gekennzeichnet. Die Validation passiert dann Serverseitig und die View wird erneut geladen. Wichtig ist, dass man alle [Wertebereiche](../../LB1/Anforderung/Daten.md) überprüft und mit Extremwerten testet.

```php
<?php
public function validierungBeispiel()
{
    // Überprüfen ob das Formular angefragt wird oder validiert werden soll (1)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Formular in eine gesunde Form bringen (2)
        $username = trim(htmlspecialchars($_POST['username']));
        $comment = trim(htmlspecialchars($_POST['comment']));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

        // Daten in Formular setzen
        $data = [
            'username' => $username,    // Form-Feld-Daten
            'username_err' => '',       // Fehlermeldung das Feld
            'comment' => $comment       // Hat keine Validierung
            'email' => $email,
            'email_err' => '',
        ];

        // Validierung (3)
        if (empty($data['username'])) {
            // Fehlermeldung setzen
            $data['username_err'] = 'Der Benutzername darf nicht leer sein';
        }

        if (empty($data['email'])) {
            $data['email_err'] = 'Die E-Mail darf nicht leer sein';
        }
        else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            // E-Mail Format überprüfen (4)
            $data['email_err'] = 'Die E-Mail hat ein ungültiges Format';
        }

        // Überprüfen, ob Fehlermeldungen vorhanden sind
        if (empty($data['username_err']) && empty($data['email_err'])) {
            // TODO: Hier müsste jetzt etwas mit den validen Daten passieren
        } else {
            // Fehler vorhanden - Fehler anzeigen
            echo $this->twig->render('seitenname.twig.html', ['data' => $data]);
        }
    } else {
        // Leeres Formular anzeigen
        $data = [
            'username' => '',       // Form-Feld-Daten
            'username_err' => '',   // Keine Fehlermeldung anzeigen
            'comment' => ''
            'email' => '',          //
            'email_err' => '',
        ];

        // Fomular anzeigen
        echo $this->twig->render('seitenname.twig.html', ['data' => $data]);
    }
}
```

1. Wenn das Formular über `GET` angefragt wird, wird die View geladen und ein leeres Formular zurückgegeben. Über `POST` wird die Validation gestartet und danach die Daten verarbeitet.
2. Mithilfe von `htmlspecialchars` und `filter_input` werden die Daten in eine gesunde Form gebracht. Dies ist wichtig, um [XSS](../../Appendix/Sicherheit.md#xss)-Attacken zu verhindern.
3. Um zu überprüfen, ob das Feld einen Wert hat kann `empty` verwendet werden. Wenn das Feld leer ist, wird eine Fehlermeldung gesetzt.
4. Das richtige Format einer E-Mail kann mit `filter_var` überprüft werden.

## View

In der View wird überprüft, ob die **Formulardaten** gültig sind, oder ob Fehler aufgetreten sind. Wenn Fehler aufgetreten sind, werden diese in der View ausgegeben. Das Feld wird dann **rot** umrandet und die **Fehlermeldung** wird angezeigt. Bestehende Daten sind auch nach dem Absenden des Formulars noch vorhanden, auch wenn Fehler aufgetreten sind. Dies ist leider nicht bei allen Formularen im Internet der Fall.

```twig
<div class="form-group">
    <label for="username">Kundenname: <sup>*</sup></label>
    {% if data.username_err is empty %}
    <input type="text" name="username" value="{{ data.username }}" class="form-control form-control-lg">
    {% else %}
    <input type="text" name="username" value="{{ data.username }}"
        class="form-control form-control-lg is-invalid">
    <span class="invalid-feedback"> {{ data.username_err }}</span>
    {% endif %}
</div>
```
