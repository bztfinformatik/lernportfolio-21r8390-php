<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <title>Not really a good design</title>
</head>

<body>
  <main class="container p-5">
    <h1 class="display-5 fw-bold text-center">❌ - Personensuche</h1>
    <hr class="pb-3" />

    <!-- (A) SUCH FORMULAR -->
    <form method="post" class="d-flex align-items-center justify-content-center">
      <div class="flex-grow-1">
        <input type="search" name="search" placeholder="Suchen ... " class="form-control">
      </div>
      <div class="ms-3">
        <input type="submit" value="🔎" class="btn btn-light clol-2" />
      </div>
    </form>

    <!-- (B) SUCHEN + RESULTATE ANZEIGEN -->
    <table class="table table-striped table-hover mt-4">
      <thead>
        <tr>
          <th scope="col">Index</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_POST["search"])) {
          // (B1) DATABASE EINSTELLUNGEN
          define("DB_HOST", "mysql");
          define("DB_NAME", "userdb");
          define("DB_CHARSET", "utf8");
          define("DB_USER", "user");
          define("DB_PASSWORD", "userpass");

          // (B2) ZUR DATENBANK VERBINDEN MIT PDO
          $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
            DB_USER,
            DB_PASSWORD,
            [
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
          );

          // (B3) SUCHEN
          $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `name` LIKE ? ORDER BY ID");
          $stmt->execute(["%{$_POST["search"]}%"]);
          $results = $stmt->fetchAll();

          // (B4) RESULTAT ANZEIGEN
          if (count($results) > 0) {
            foreach ($results as $r) {
              echo "<tr><td>{$r["id"]}</td><td>{$r["name"]}</td></tr>";
            }
          }
        }
        ?>
      </tbody>
    </table>
  </main>
</body>

</html>