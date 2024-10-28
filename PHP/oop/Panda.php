<?php
require_once('./Animal.php');


class Panda extends Animal {
    // private $name;
    // private $residence;

    // //생성자
    // public function __construct($name, $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    // //정보 출력
    // public function printInfo() {
    //     return $this->name."는 ".$this->residence."귀여워//";
    // }
    public function swim() {
        return "후이~루이~";
    }
}