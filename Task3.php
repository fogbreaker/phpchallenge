<?php

use Models\Buch;

include_once(dirname(__FILE__) . '/config.php');
include_once(dirname(__FILE__) . '/Models/Buch.php');




// =========== <BEGIN TASK 3> =============

/* Task 3a.) Au Backe! Es sieht so aus als hätte unser LHModel noch ein paar Kinderkrankheiten.

  Die Funktion Load() ist wohl anfällig für Exploits bzw. ist in der jetzigen Implementierung unsicher.
  Die Verwendung in einem Produktivsystem hätte wohl fatale Folgen...

  Warum?
*/