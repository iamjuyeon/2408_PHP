<?php
// require_once('./Animal.php');
require_once('./Dolphin.php');
require_once('./Panda.php');

$dolphin = new Dolphin("돌고래", "너무너무");
echo $dolphin->printInfo();

$panda = new Panda("판다", "너무너무");
echo $panda->printInfo();