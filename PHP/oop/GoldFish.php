<?php
namespace PHP\oop;

require_once('./Swim.php');
require_once('./Pet.php');

use PHP\oop\Pet;
use PHP\oop\Swim;
//인터페이스 : 서로 다른 애들끼리 묶기 위해서?
//소스코드의 표준화를 위해서 사용
//인터페이스 : implements(구현)
//인터페이스는 다중 상속 구현 가능
class GoldFish implements Swim, Pet {
    private $name = "금붕어";
    public function swimming() {
        return "수영합니다";
    }
    public function printPet() {
        return "첨벙첨벙";
    }
}