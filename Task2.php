<?php

use Models\Buch;
//use Models\User; uncomment

include_once(dirname(__FILE__) . '/config.php');
include_once(dirname(__FILE__) . '/Models/Buch.php');
include_once(dirname(__FILE__) . '/Models/User.php');


// =========== <INTRO> =============

/** Die Buch-Funktion wird von der Klasse LHModel abgeleitet und erbt damit all
 * ihre Funktionen und Eigenschaften. Die Load-Funktion hat eine Reihe von Parametern, wobei der erste
 * Parameter (ein assoziatives Array) der wichtigste ist:
 */

$load = ['Bezeichnung' => "Harry Potter und der Feuerkelch"];
$feuerkelch = Buch::Load($load, Limit: 1);
var_dump($feuerkelch);


/** ... wie Sie sehen, können Sie mit $load die Beziehung SPALTENNAME => WERT herstellen,
 * und damit den entsprechenden Eintrag aus der Datenbank laden, und gleich in das entsprechende Objekt
 * zu formen. Der Zugriff auf die Daten ist nun bequem mittels "->" möglich.
 */
echo "-----------"."<br/>";




// =========== <TASK 2a> =============
echo "---- TASK 2a.) ----"."<br/>";
/* 2a.) Analysieren Sie Funktion LHModel::Load() - Beantworten Sie folgenden Fragen: //todo
 -> Welche darin enthaltene Funktion macht es möglich dass eine Datenbankzeile einem tatsächlichen Objekt zugeordnet wird?
 -> Betrachten Sie den Codeabschnitt aus dem Intro & analyisieren Sie die Variable $feuerkelch. Woher weiss $feuerkelch dass es vom Typ "Buch" ist? Welches Schlüsselwort steht im engen Zusammenhang damit? */


// =========== <TASK 2b> =============
echo "---- TASK 2b.) ----"."<br/>";
/* 2b.) Laden Sie alle Bücher aus der Datenbank und geben Sie allen Büchern mit einer Seitenanzahl > 200 die Bewertung 5. Speichern Sie das Ergebnis zurück in die Datenbank, und eliminieren Sie alle Bücher von George Orwell
*/




// =========== <TASK 2c> =============
echo "---- TASK 2c.) ----"."<br/>";
/* 2c.) Sie sind großer Harry Potter Fan! Implementieren Sie die Nutzklasse "User" sowohl Datenbank als auch PHP-Klassenseitig. Diese soll folgende Eigenschaften aufweisen:
    Vorname  -> varchar(40)
    Nachname -> varchar(40)
    Email => varchar(40)

    Erstellen Sie nun mithilfe der Funktion Create() zwei neue Benutzer. Stellen Sie danach eine n:1 Beziehung zwischen allen Harry Potter Büchern und Benutzer 1 her. Dem zweiten Benutzer weisen Sie alle restlichen Bücher zu.
    Verwenden Sie dazu das Feld "UserPid" im Buch.
    Beispiel:
        "Feuerkelch" =>  "First Lady"
        "Stein der Waisen" => "First Lady"

        "Die Verwandlung" => "2Pac"
        "Faust" => "2Pac"
        ...


    Implementieren Sie in der User-Klasse eine nicht statische Funktion, welche alle Bücher des Benutzers (als Array von Objekten) zurückgibt.
    Tipp: Die Implementierung des Funktionskörpers ist in einer Zeile möglich.
*/

