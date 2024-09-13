<?php

class Shark {
    public $name; 
    
    //생성자 (construct)
    // 객체를 인스턴스화 할때, 딱 한번 실행되는 메소드
    public function __construct($name) {
        $this->name = $name;
        
    }
}