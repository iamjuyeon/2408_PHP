<?php
// 두 수를 전달해주면 합을 반환해주는 함수
function my_sum($num1, $num2) {
    return $num1 + $num2;
}

my_sum(3, 5); //함수 호출
echo "\n";

function sum($a, $b) {
    $x = $a + $b;
    echo $x;
}
sum(1,5);

echo "\n";
// 두수를 받아서  - * / %의 결과를 리턴하는 함수를 만들어주세요
function subtract($num1, $num2) {
    return $num1 - $num2;;
}
echo subtract(10, 1);

echo "\n";

function times($num3, $num4) {
    return $num3 * $num4;
}
echo times(2,9);

echo "\n";

function divide($num5, $num6) {
    return $num5 / $num6;
}
echo divide(4,2);

echo "\n";

function remainder($num7, $num8) {
    return $num7 % $num8;
}
echo remainder(10,3);

echo "\n";
//가변 아규먼트
// 전달되는 모든 숫자를 더해서 반환(**주의**: php5.6 이상에서 사용가능)
function my_sum_all(...$numbers) {  //$numbers: 데이터타입 array
    $sum = 0;

    foreach($numbers as $val) {
        $sum += $val;
    }
    return $sum;
}
echo my_sum_all(6,2,3,8,32);

echo "\n";
function sum_all(...$numbers) {  //$numbers: 데이터타입 array
   
    return array_sum($numbers);
}
echo sum_all(6,2,3,8,32);

//5.5버전 이하
// function my_sum_all() {  //$numbers: 데이터타입 array
//     $numbers = func_get_args();
//     $sum =0; 
//     foreach($numbers as $val) {
//         $sum += $val;
//     }
//     return $sum;
// }
// echo my_sum_all(6,2,3,8,32);
echo "\n";
function test($param_str, ...$arr_str) {
    $str = "";
    foreach($arr_str as $val) {
        $str .=$val;
    }
    $str .= $param_str;
    echo $str;
}
test("젤뒤", "a", "b", "c");

//로또번호 뽑기

