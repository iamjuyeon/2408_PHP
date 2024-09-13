<?php
// class : 동종의 객체들을 모아 정의한 것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다
class Whale {
    //멤버 : 아래 전체를 
    //프로퍼티
    //접근제어 지시자
    // public : 클래스 내외 접근 가능)
    public $name = "고래"; 
    // private : 클래스 내에서만 접근 가능
    private $age = 30;
    // protected : 클래스 내부 및 상속 관계에서 접근 가능(외부 접근 불가)
    protected $gender;


    //메소드(mothod)
    function breath() {
        echo "숨을 쉽니다.";
    }

    function info() {
        //$this : class내의 프로퍼티나 메소드에 접근하기 위해서 사용
        echo "나이는".$this->age;
    }

    //static 메소드
    public static function myStatic() {
        echo "스테틱 메소드";
    }
}