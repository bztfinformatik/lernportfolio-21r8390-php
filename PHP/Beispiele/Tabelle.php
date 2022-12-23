<h1>In Tabelle ausgeben</h1>
<?php
$array = array(3, 7, 5, 1, 8, 13, 2);

echo "<table border='1'>";
echo "<tr><th>Index</th><th>Wert</th></tr>";
for ($i = 0; $i < count($array); $i++) {
    echo "<tr><td>$i</td><td>$array[$i]</td></tr>";
}
echo "</table>";
?>

<?php
$array = array("name" => "Manuel", "alter" => 18, "klasse" => "IN20/24c");

echo "<table border='1'>";
echo "<tr><th>Index</th><th>Wert</th></tr>";
foreach ($array as $key => $value) {
    echo "<tr><td>$key</td><td>$value</td></tr>";
}
echo "</table>";
?>