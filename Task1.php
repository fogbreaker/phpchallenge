<?php

// =========== <BEGIN TASK 1> =============

/** Schreiben Sie eine PHP-Funktion, die eine beliebige Anzahl von Zahlen als Argumente akzeptiert und den Durchschnitt dieser Zahlen berechnet.
 Die Funktion sollte auch die Anzahl der geraden und ungeraden Zahlen zurückgeben, die als Argumente übergeben wurden.
*/
// a.) Machen Sie sich Gedanken über die Funktionssignatur. Wie oft müssen Sie das Schlüsselwort $ bei der Argumentübergabe verwenden? //todo

// b.) Welchen Rückgabetyp muss die Funktion aufweisen um die Ergebnisse als "Gesamtes" zu übermitteln? Nennen Sie 2 Möglichkeiten. //todo

// c.) Versuchen Sie die Funktion "CalculateAverage" zu implementieren //todo

$result = CalculateAverage(2, 4, 6, 8, 10); //Achtung, es sollen auch mehr oder weniger Parameter übergeben werden können.
echo "Durchschnitt: " . $result["average"] . "<br>";
echo "Gerade Zahlen: " . $result["even_count"] . "<br>";
echo "Ungerade Zahlen: " . $result["odd_count"] . "<br>";

// =========== <END TASK 1> =============