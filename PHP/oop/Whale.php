<?php
namespace PHP\oop;

require_once('./Mammal.php');
require_once('./Swim.php');

//어디에 있는 Mammal를 사용
use PHP\oop\Mammal;
use PHP\oop\Swim;

class Whale extends Mammal implements Swim {
        
    
    // 상속 : extends
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
    
    //수영 메소드
    public function swimming() {
        return "수영합니다.";
    }

    public function printInfo() {
        return "고래고래고래";
        
    }
}














//************************************************************* */
// class Whale {
//     //프로퍼티
//     public $name = "고래";
//     private $age = 200;

//     //생성자 : 세상이 뒤집어져도 __construct
//     public function __construct($name, $age) {
//         $this->name = $name;
//         $this->age = $age;

//     }



//     //메소드 
//     public function breath() {
//         return "숨을 쉽니다.";
//     }

//     public function printInfo() {
//         return $this->name."는 ".$this->age."살 입니다."; //$this class Whale 안에 내용을 가리킴
//     }

//     //private은 외부에서 접근하기 어렵기 때문에 getter/setter 사용
//     //getter/setter 메소드
//     public function getAge() {
//         return $this->age;
//     }
//     public function setAge($age) {
//         $this->age = $age;
//     }

//     //스태틱 메소드
//     public static function dance() {
//         return '고래가 춤을 춥니다';
//     }

// }

// echo Whale::dance();
//여기저기서 자주 사용할만 것들만 static으로 만들어둔다


//Whale instance
// $whale = new Whale("핑크고래", 40);
// // $whale2 = new Whale();
// echo $whale->printInfo();

// $whale -> setAge(30);
// echo $whale2->getAge();


