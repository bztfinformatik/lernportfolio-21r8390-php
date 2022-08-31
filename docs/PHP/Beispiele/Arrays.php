<h1>Arrays</h1>

<h3>Numerisches Array</h3>
<?php
$array = array(1, 2, 3, 4, 5);

echo $array[0]; //1

echo $array[1]; //2

echo $array[2]; //3

echo $array[3]; //4

echo $array[4]; //5
?>

<h3>Assoziatives Array</h3>
<?php
$array = array("name" => "Manuel", "alter" => 18);

echo $array["name"]; //Manuel

echo $array["alter"]; //18
?>

<h3>Mehrdimensionales Array</h3>
<?php
$array = array(
    array("name" => "Manuel", "alter" => 18),
    array("name" => "Herr Inauen", "alter" => 20)
);

echo $array[0]["name"]; //Manuel

echo $array[0]["alter"]; //18

echo $array[1]["name"]; //Herr Inauen

echo $array[1]["alter"]; //23
?>

<hr>

<h2>Werte hinzufügen</h2>

<h3>Numerisches Array</h3>
<?
$array = array();

$array[] = "Manuel";

echo $array[0]; //Manuel
?>

<h3>Assoziatives Array</h3>
<?
$array = array();

$array["name"] = "Manuel";

echo $array["name"]; //Manuel
?>