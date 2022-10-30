---
tags:
    - PHP
    - Framework
---

# Validation

Die Validation von Formularen ist ein wichtiger **Bestandteil** eines jeden Frameworks. In diesem Kapitel wird die Validation von unserem eigenen Framework vorgestellt. Die Validation passiert für jedes Formular einzeln und wird über HTTP-Methoden gesteuert.

## Controller

IM Controller wird **überprüft** ob das Formular angefragt wird oder validiert werden sollte. Wenn das Formular über `GET` angefragt wird, wird die View geladen und ein leeres Formular zurückgegeben. Wenn das Formular **validiert** werden soll, wird dies mit der HTTP-Methode `POST` gekennzeichnet. Die Validation passiert dann Serverseitig und die View wird erneut geladen. Wichtig ist, dass man alle [Wertebereiche](../../LB1/Anforderung/Daten.md) überprüft und mit Extremwerten testet.

```php
public function add($pagename = 'Order - Add')
{
    $orderModel = $this->model('OrderModel');
    $menueModel = $this->model('MenueModel');
    $menueArray = $menueModel->getFakeMenueDataArray();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process Form -> weil Post-Aufruf
        // Zuerst mal trimen und filtern auf gesunde Daten
        // Since 8.0
        $username = trim(htmlspecialchars($_POST['username']));
        $comment = trim(htmlspecialchars($_POST['comment']));
        $email = trim(
            filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)
        );
        $refmenue = trim(
            filter_input(INPUT_POST, 'refmenue', FILTER_SANITIZE_NUMBER_INT)
        );

        // Daten setzen
        $data = [
            'username' => $username,       // Form-Feld-Daten
            'username_err' => '',   // Feldermeldung für Attribute
            'email' => $email,          // Form-Feld-Daten
            'email_err' => '',      // Feldermeldung für Attribute
            'refmenue' => $refmenue,       // Form-Feld-Daten
            'refmenue_err' => '',   // Feldermeldung für Attribute
            'comment' => $comment       // Form-Feld-Daten
        ];

        // Gucken ob die Daten plausibel sind
        // Da müsste man aber noch mehr machen
        if (empty($data['username'])) {
            $data['username_err'] = 'Bitte Name angeben';
        }

        if (empty($data['email'])) {
            $data['email_err'] = 'Bitte Email angeben';
        }

        if (empty($data['refmenue'])) {
            $data['refmenue_err'] = 'Bitte Menü auswählen';
        }

        // Keine Errors vorhanden
        if (empty($data['username_err']) && empty($data['email_err']) && empty($data['refmenue_err'])) {
            // Alles gut, keine Fehler vorhanden
            // Späteres TODO: Auf DB schreiben
            $orderModel->fakewriteData($data);
        } else {
            // Fehler vorhanden - Fehler anzeigen
            // View laden mit Fehlern
            echo $this->twig->render('order/add.twig.html', ['title' => $pagename, 'urlroot' => URLROOT, 'data' => $data, 'menues' => $menueArray]);
        }
    } else {
        // Init Form mit Default-Daten, weil Get-Aufruf
        $data = [
            'username' => '',       // Form-Feld-Daten
            'username_err' => '',   // Feldermeldung für Attribute
            'email' => '',          // Form-Feld-Daten
            'email_err' => '',      // Feldermeldung für Attribute
            'refmenue' => '',       // Form-Feld-Daten
            'refmenue_err' => '',    // Feldermeldung für Attribute
            'comment' => ''       // Form-Feld-Daten
        ];
        echo $this->twig->render('order/add.twig.html', ['title' => "Order - Add", 'urlroot' => URLROOT, 'data' => $data, 'menues' => $menueArray]);
    }
}
```

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
