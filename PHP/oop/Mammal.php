<?php
//네임스페이스 : 
namespace PHP\oop;

//추상클래스
abstract class Mammal {
    private $name;
    private $residence;

    //생성자
    public function __construct($name, $residence) {
    $this->name = $name;
    $this->residence = $residence;
    }


    //추상메소드
    abstract public function printInfo(); //처리부분이 필요없다, 단 무조건 자식에게 새로 재정의해야함
}

// class Mammal {
//     private $name;
//     private $residence;

//     //생성자
//     public function __construct($name, $residence) {
//         $this->name = $name;
//         $this->residence = $residence;
//     }
//     //정보 출력
//     public function printInfo() {
//         return $this->name.'가 '.$this->residence.'에 삽니다.';

//     }
// }