<?php

//echo "Hallo Welt";

// Die folgenden Werte kommen aus dem Docker-Compose File
$pdo = new PDO('mysql:host=mysql;dbname=testdb', 'user', 'userpass');

$sql = "SELECT * FROM mytable";
foreach ($pdo->query($sql) as $row) {
   echo $row['myfield']."<br />";
}