<?php

class Animal {
    private $name;
    private $residence;

    public function __construct($name, $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }
    public function printInfo() {
        return $this->name."는 ".$this->residence."귀여워//";
    }
}