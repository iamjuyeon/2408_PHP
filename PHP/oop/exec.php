<?php
require_once('./FlyingSquirrel.php');
require_once('./Whale.php');
require_once('./GoldFish.php');

use PHP\oop\GoldFish;
use PHP\oop\Whale;
use PHP\oop\FlyingSquirrel;

$whale = new Whale('고래', '바다');
echo $whale->printInfo();

$flyingSquirrel =  new FlyingSquirrel('날다람쥐', '나무');
echo $flyingSquirrel->printInfo();

$GoldFish = new GoldFish();
echo $GoldFish->printPet();