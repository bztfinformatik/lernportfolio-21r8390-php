<h1>Rechnen mit Variablen</h1>

<?php
$zahl1 = 10;
$zahl2 = 5.5;

echo $zahl1 + $zahl2; //addieren

echo $zahl1 - $zahl2; //subtrahieren

echo $zahl1 * $zahl2; //multiplizieren

echo $zahl1 / $zahl2; //dividieren

echo pow($zahl1, $zahl2); //Zahl1 hoch Zahl2 (10^5)

echo sqrt(64); // Wurzel von √64

echo 2 * $zahl1 + 5 * $zahl2 - 3; //Berechnet (2*10) + (5*5) - 3
?>

<hr>

<h2>Kurzschreibweise</h2>

<?
$zahl1 = 10;
$zahl2 = 5.5;

echo ++$zahl1; //Inkrementieren

echo $zahl1 += 5; //Addieren

echo --$zahl1; //Dekrementieren

echo $zahl1 -= 5; //Subtrahieren
?>