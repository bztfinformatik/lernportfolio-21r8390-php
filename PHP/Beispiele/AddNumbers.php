<?

/**
 * Funktion zum Addieren von zwei Zahlen
 *
 * @param integer $first Erster Wert
 * @param integer $second Zweiter Wert
 * @return integer Summe der beiden Zahlen
 */
function addNumbers(int $first, int $second): int
{
    return $first + $second;
}

// Aufruf der Funktion
addNumbers(2, 3);

// declare(strict_types=1)
addNumbers(2, "3");
