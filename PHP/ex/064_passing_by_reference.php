<?php
// 값 복사 방식 데이터 타입:int~array
// $num1 = 100;
// $num2 = $num1;
// $num2 -= 50;
// echo $num1, $num2; // num1=100 num2=50
// echo "\n";

//참조 전달(passing by reference) 데이터타입:odject
// $num3 = 100;
// $num4 = &$num3;
// $num4 -= 50;
// echo $num3, $num4; // num3=50, num4=50
// echo "\n";

// function my_test($num) {
//     $num--;
//     echo "my_test() : ".$num."\n";
// }
// $num5 = 5;
// my_test($num5);
// echo $num5;

// echo "\n";
//----------------
// 스코프 : 변수나 함수의 유효 범위
//전역 스코프
$str = "전역 스코프";

function my_scope1() {
    global $str; //전역 스코프 사용을 위해 선언
    echo $str; 
}

my_scope1();

echo "\n";
// 지역 스코프
function my_scope2() {
    $str2 = "my_scope2 영역";
    echo $str2;
}
my_scope2(); 