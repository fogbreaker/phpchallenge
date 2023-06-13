<?php

// =========== <INDEX TEST 1> =============

include_once(dirname(__FILE__) . '/config.php');
include_once(dirname(__FILE__) . '/Models/Buch.php');


$feuerkelch = \Models\Buch::Load(['id' => 1]);
if (count($feuerkelch) > 0 && $feuerkelch[0]->id == 1) {
    echo "✅ Das sieht gut aus! Die Konfiguration scheint OK";
    exit;
}
echo "❌ Etwas passt noch nicht, bitte anpassen";
exit;
