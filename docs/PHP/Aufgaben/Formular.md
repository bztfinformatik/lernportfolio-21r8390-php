---
tags:
    - PHP
    - Aufgaben
---

# Formular

Es gibt zwei Arten wie Formulare funktionieren können. Das eine wär der **Selbstverweis**, welcher die Daten an die selbe Seite sendet. Also ruft es sich somit selbst auf. Formulare können jedoch auch Daten an ein anderes Script schicken, was sich **Externerverweis** nennen würde. Die Art des Aufrufs kann über den Formulartag `#!html action` gesteuert werden. Dort muss dann der Pfad zu einer Datei hinterlegt werden. Um einen Selbstverweis zu erstellen wird sollte `#!sql $_SERVER['PHP_SELF']` verwendet werden. Das gibt den Namen der aktuellen Datei aus, was einen **Schutz** gegen Umbenennungen und Verschiebungen ist. Zudem kann ein Formular über [GET oder POST](HTTP-Parameter.md#anwendungsfälle) die Daten senden.

## Donut Bestellung

Das folgende Formular funktioniert über einen Selbstverweis. Falls beim Aufruf Daten übergeben wurden, werden diese in einer Tabelle ausgegeben. Vor der Ausgabe eines **Parameters** wird geprüft, ob der Parameter existiert und einen Wert besitzt. Wenn dies nicht der Fall ist, wird die Ausgabe auf leer gesetzt. Dabei ist der Operator `??` ein unumgängliches Hilfsmittel, da undefinierte Werte durch einen anderen Wert ersetzt werden können. Mithilfe von [Bootstrap](https://getbootstrap.com/docs/5.2/forms/form-control/) wurde es schön und selbstverständlich **Responsive** gemacht. Wichtig ist, dass jegliche Ausgaben auf schädliche Inhalte überprüft werden müssen. Dies passiert hier mit `#!php htmlspecialchars()`. Dieser Filter ersetzt alle **HTML-Sonderzeichen** durch ihre HTML-Entitäten. Dies verhindert, dass ein Angreifer HTML-Code in die Ausgabe einfügen kann. Dieser wird dann als Text ausgegeben und nicht als HTML interpretiert. Die **Auswertung** erfolgt über ein Flyout, welches erst dargestellt wird, wenn Daten vorhanden sind.

## Resultat

Das Resultat aus den folgenden **Codeschnipseln** kann live auf [edu.flimtix.dev](https://edu.flimtix.dev/M133-Aufgaben/Formular/) angesehen oder [hier](../Beispiele/Formular.php) als komplette Datei heruntergeladen werden.

### Formular

```php title="Formular"
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'utf-8'); ?>" method="GET" class="row g-3">
   <!-- Firma / Privatperson -->
   <div class="row col-12 mt-2 mx-2">
      <div class="form-check col-6">
         <input class="form-check-input" type="radio" name="art" value="privatperson" id="privatperson" checked>
         <label class="form-check-label" for="privatperson">Privatperson</label>
      </div>
      <div class="form-check col-6">
         <input class="form-check-input" type="radio" name="art" value="firma" id="firma">
         <label class="form-check-label" for="firma">Firma</label>
      </div>
   </div>

   <!-- Anrede -->
   <div class="form-floating col-12">
      <select class="form-select" id="anrede" name="anrede">
         <option value="1" selected disabled hidden>Anrede auswählen</option>
         <option value="1">👦 - Mann</option>
         <option value="2">👩 - Frau</option>
         <option value="3">🚁 - Kampfhelikopter</option>
      </select>
      <label for="anrede">Anrede</label>
   </div>

   <!-- Vorname & Nachname -->
   <div class="form-floating col-12 col-md-6">
      <input type="text" class="form-control" id="vorname" name="vorname" placeholder="Vorname" required>
      <label for="vorname">Vorname</label>
   </div>
   <div class="form-floating col-12 col-md-6">
      <input type="text" class="form-control" id="nachname" name="nachname" placeholder="Nachname" required>
      <label for="nachname">Nachname</label>
   </div>

   <!-- E-Mail -->
   <div class="form-floating col-12">
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      <label for="email">Email</label>
   </div>

   <!-- Sorte -->
   <hr />
   <div class="form-floating col-12">
      <select class="form-select" id="sorte" name="sorte">
         <option value="1" selected disabled hidden>Sorte auswählen</option>
         <option value="1">🍩 - Donut</option>
         <option value="2">🍩 - Donut mit Schokolade</option>
         <option value="3">🍩 - Donut mit Schokolade und Nüssen</option>
      </select>
      <label for="sorte">Sorte</label>
   </div>

   <!-- Anzahl -->
   <div class="form-floating col-12">
      <input type="number" class="form-control" id="anzahl" name="anzahl" min="1" max="500" placeholder="Anzahl" required>
      <label for="anzahl">Anzahl</label>
   </div>

   <!-- Adresse -->
   <hr />
   <div class="form-floating col-12">
      <input type="text" class="form-control" id="zusatz" name="zusatz" placeholder="Adresszusatz">
      <label for="zusatz">Adresszusatz</label>
   </div>
   <div class="form-floating col-9 col-md-8">
      <input type="text" class="form-control" id="strasse" name="strasse" placeholder="Strasse" required>
      <label for="strasse">Strasse</label>
   </div>
   <div class="form-floating col-3 col-md-4">
      <input type="text" class="form-control" id="hausnummer" name="hausnummer" placeholder="Hausnummer">
      <label for="hausnummer">Hausnummer</label>
   </div>
   <div class="form-floating col-3 col-md-4">
      <input type="text" class="form-control" id="plz" name="plz" placeholder="PLZ" required>
      <label for="plz">PLZ</label>
   </div>
   <div class="form-floating col-9 col-md-8">
      <input type="text" class="form-control" id="ort" name="ort" placeholder="Ort" required>
      <label for="ort">Ort</label>
   </div>

   <!-- Lieferdatum -->
   <hr />
   <div class="form-floating col-12">
      <input type="date" class="form-control" id="lieferdatum" name="lieferdatum" placeholder="Lieferdatum" value="<?php echo (new DateTime())->format('Y-m-d') ?>" required>
      <label for="lieferdatum">Lieferdatum</label>
   </div>

   <!-- Weitere Informationen -->
   <div class="form-floating col-12">
      <textarea class="form-control" placeholder="Freitext" id="freitext" name="freitext" style="height: 120px;" rows=" 5"></textarea>
      <label for="freitext">Weitere Informationen</label>
   </div>

   <button type="submit" class="btn btn-primary">Bestellen 📦</button>
</form>
```

### Auswertung

```php title="Auswertung"
<!-- Auswertung -->
<div class="offcanvas offcanvas-bottom <?php echo empty($_POST) && empty($_GET) ? '' : 'show'; ?>" tabindex="-1" id="uebersichtBestellung" aria-labelledby="offcanvasTopLabel">
   <div class="offcanvas-header">
      <h2 class="offcanvas-title" id="offcanvasTopLabel">Bestellung</h2>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body">
      <table class="table mb-5">
         <thead>
            <tr>
               <th scope="col">Besteller</th>
               <th scope="col">Anrede</th>
               <th scope="col">Vorname</th>
               <th scope="col">Nachname</th>
               <th scope="col">Email</th>
               <th scope="col">Sorte</th>
               <th scope="col">Anzahl</th>
               <th scope="col">Lieferdatum</th>
               <th scope="col">Freitext</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $bestellung = empty($_POST) ? $_GET : $_POST;
            if (!empty($bestellung)) {
               echo "<tr>";
               echo "<td>" . (isset($bestellung['art']) && $bestellung['art'] == 'firma' ? 'Firma' : 'Privatperson')                 . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['anrede'] ?? '', ENT_QUOTES, "utf-8")       . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['vorname'] ?? '', ENT_QUOTES, "utf-8")      . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['nachname'] ?? '', ENT_QUOTES, "utf-8")     . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['email'] ?? '', ENT_QUOTES, "utf-8")        . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['sorte'] ?? '', ENT_QUOTES, "utf-8")        . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['anzahl'] ?? '', ENT_QUOTES, "utf-8")       . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['lieferdatum'] ?? '', ENT_QUOTES, "utf-8")  . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['freitext'] ?? '', ENT_QUOTES, "utf-8")     . "</td>";
               echo "</tr>";
            }
            ?>
         </tbody>
      </table>

      <hr />

      <table class=" table">
         <thead>
            <tr>
               <th scope="col">Adresszusatz</th>
               <th scope="col">Strasse</th>
               <th scope="col">Hausnummer</th>
               <th scope="col">PLZ</th>
               <th scope="col">Ort</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $bestellung = empty($_POST) ? $_GET : $_POST;
            if (!empty($bestellung)) {
               echo "<tr>";
               echo "<td>" . htmlspecialchars($bestellung['zusatz'] ?? '', ENT_QUOTES, "utf-8")       . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['strasse'] ?? '', ENT_QUOTES, "utf-8")      . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['hausnummer'] ?? '', ENT_QUOTES, "utf-8")   . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['plz'] ?? '', ENT_QUOTES, "utf-8")          . "</td>";
               echo "<td>" . htmlspecialchars($bestellung['ort'] ?? '', ENT_QUOTES, "utf-8")          . "</td>";
               echo "</tr>";
            }
            ?>
         </tbody>
      </table>
   </div>
</div>
```
