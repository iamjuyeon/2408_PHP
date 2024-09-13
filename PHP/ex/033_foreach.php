<?php
//foreach 문 : 배열을 편하게 루프하기 위한 반복문
$arr = [1,2,3];
foreach($arr as $key => $val) {
    echo "key : ".$key.", value : ".$val."\n";

}

$arr2 = [1,2,3,5,6,7,8,9];

// 구구단 2단
foreach($arr2 as $resul) {
    echo "2 X ".$resul." = ".($resul*2)."\n";  
}

// 연관배열
$arr3 = [
    "name" => "pubao"
    ,"age" => 4
    ,"gender" => "F"
];

foreach($arr3 as $key => $val) {
    echo $key." : ".$val."\n";
}

// foreach($surelt as $key => $itme) {
//     echo $imen[:name]."\n]
// }