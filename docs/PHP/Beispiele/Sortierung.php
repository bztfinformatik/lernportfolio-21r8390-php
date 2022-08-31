<?php
// https://medium.com/the-protean-journal/the-quicksort-algorithm-implemented-in-php-692798f91aee

function printTable($array, string $title)
{
    echo "<h1>Quicksort - " . $title . "</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Index</th><th>Wert</th></tr>";
    for ($i = 0; $i < count($array); $i++) {
        echo "<tr><td>$i</td><td>$array[$i]</td></tr>";
    }
    echo "</table>";
}

class Sorting
{
    private static function partition(&$array, int $left, int $right): int
    {
        $pivotIndex = floor($left + ($right - $left) / 2);
        $pivotValue = $array[$pivotIndex];
        $i = $left;
        $j = $right;
        while ($i <= $j) {
            while ($array[$i] < $pivotValue) {
                $i++;
            }
            while ($array[$j] > $pivotValue) {
                $j--;
            }
            if ($i <= $j) {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
                $i++;
                $j--;
            }
        }
        return $i;
    }

    private static function quicksort(&$array, int $left, int $right): void
    {
        if ($left < $right) {
            $pivotIndex = Sorting::partition($array, $left, $right);
            Sorting::quicksort($array, $left, $pivotIndex - 1);
            Sorting::quicksort($array, $pivotIndex, $right);
        }
    }

    public static function sort(&$array): void
    {
        Sorting::quicksort($array, 0, count($array) - 1);
    }
}

$array = array();
for ($i = 0; $i < 10; $i++) {
    $array[] = rand(0, 200);
}

printTable($array, "Unsortiert");
Sorting::sort($array);
printTable($array, "Sortiert");
