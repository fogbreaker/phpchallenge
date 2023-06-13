<?php

use Models\LHDatabase;

include_once(dirname(__FILE__) . '/Models/LHModel.php');
include_once(dirname(__FILE__) . '/Models/LHDatabase.php');


// =========== <INI> =============

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// =========== <DATENBANK> =============
global $mysqli;

$Hostname = "localhost";
$Username = "phpChallenge"; //todo aendern
$Passwort = "Password"; //todo aendern
$Datenbank = "phpChallenge"; //todo aendern


$mysqli = new LHDatabase($Hostname, $Datenbank, $Username, $Passwort);

// =========== <LOCALE> =============
setlocale(LC_TIME, 'de_DE.utf-8'); //mac
setlocale(LC_TIME, 'de_DE.utf8'); //linux
