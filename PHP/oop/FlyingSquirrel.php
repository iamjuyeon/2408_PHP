<?php
namespace PHP\oop;
require_once('./Mammal.php');
require_once('./Pet.php');

use PHP\oop\Pet;
use PHP\oop\Mammal;

class FlyingSquirrel extends Mammal implements Pet {
    //부모에게 상속받기 위해 부모 클래스 이름 적어야 함
    // private $name;
    // private $residence;

    // //생성자
    // public function __construct($name, $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    // //정보 출력
    // public function printInfo() {
    //     return $this->name.'가 '.$this->residence.'에 삽니다.';

    // }
    //비행 메소드
    public function flying() {
        return "날아갑니다 피융.";
    }

    //오버라이딩 : 자식쪽에서 재정의
    // public function printInfo() {
    //     return parent::printInfo(). "룰루랄라";
    // }

    public function printInfo() {
        return "고뤵??~~";
    }

    //추상메소드
    public function printPet() {
        return '펫입니다 찍찍';
    }

}



//추상화 : 공통적인 부분들을 추출해서 한 파일로 통합
