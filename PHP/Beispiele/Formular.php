<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Manuel Schumacher">
    <meta name="description" content="Ein einfaches Formular mit PHP und Bootstrap">
    <title>M133 - Formular</title>
    <link rel="icon" type="image/x-icon" href="assets/donut.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
</head>

<body>
    <main class="container p-5">
        <img class="d-block mx-auto mb-4" src="assets/donut.png" alt="Donut Icon" width="260" height="190">
        <h1 class="display-5 fw-bold text-center">Donut Bestellung</h1>
        <hr class="pb-3" />

        <div class="shadow-lg p-4 mt-3 bg-body rounded">
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
        </div>

    </main>

    <!-- Auswertung -->
    <div class="offcanvas offcanvas-bottom <?php echo empty($_POST) && empty($_GET) ? 'hide' : 'show'; ?>" tabindex="-1" id="uebersichtBestellung" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasTopLabel">Bestellung</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <table class="table mb-5">
                <caption>Bestellinformationen</caption>
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
                        $start = "<td>";
                        $end = "</td>";
                        echo $start . (isset($bestellung['art']) && $bestellung['art'] == 'firma' ? 'Firma' : 'Privatperson')                 . $end;
                        echo $start . htmlspecialchars($bestellung['anrede'] ?? '', ENT_QUOTES, "utf-8")       . $end;
                        echo $start . htmlspecialchars($bestellung['vorname'] ?? '', ENT_QUOTES, "utf-8")      . $end;
                        echo $start . htmlspecialchars($bestellung['nachname'] ?? '', ENT_QUOTES, "utf-8")     . $end;
                        echo $start . htmlspecialchars($bestellung['email'] ?? '', ENT_QUOTES, "utf-8")        . $end;
                        echo $start . htmlspecialchars($bestellung['sorte'] ?? '', ENT_QUOTES, "utf-8")        . $end;
                        echo $start . htmlspecialchars($bestellung['anzahl'] ?? '', ENT_QUOTES, "utf-8")       . $end;
                        echo $start . htmlspecialchars($bestellung['lieferdatum'] ?? '', ENT_QUOTES, "utf-8")  . $end;
                        echo $start . htmlspecialchars($bestellung['freitext'] ?? '', ENT_QUOTES, "utf-8")     . $end;
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <hr />

            <table class=" table">
                <caption>Adresse</caption>
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
                        $start = "<td>";
                        $end = "</td>";
                        echo $start . htmlspecialchars($bestellung['zusatz'] ?? '', ENT_QUOTES, "utf-8")       . $end;
                        echo $start . htmlspecialchars($bestellung['strasse'] ?? '', ENT_QUOTES, "utf-8")      . $end;
                        echo $start . htmlspecialchars($bestellung['hausnummer'] ?? '', ENT_QUOTES, "utf-8")   . $end;
                        echo $start . htmlspecialchars($bestellung['plz'] ?? '', ENT_QUOTES, "utf-8")          . $end;
                        echo $start . htmlspecialchars($bestellung['ort'] ?? '', ENT_QUOTES, "utf-8")          . $end;
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bestätigung -->
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast fade <?php echo empty($_POST) && empty($_GET) ? 'hide' : 'show'; ?>" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-vector-pen"></i>
                <strong class="ms-2 me-auto"> Bestellung</strong>
                <small>Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Vielen Dank für Ihre Bestellung. 🎉 <br />
                Wir werden uns so schnell wie möglich bei Ihnen melden.
            </div>
        </div>
    </div>
</body>

</html>