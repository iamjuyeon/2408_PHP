<?php

//array

//배열 선언
$arr = [4, 3, 6, 1];

// 5.3버전 이하에서는 
// $arr = array(1, 2, 3, 4);

echo $arr[1];

// 배열에서 특정 요소 변경
$arr[2] = 100;
var_dump($arr);

$arr[0] = "안녕하세요";
echo $arr[0];
echo "\n";
echo "\n";
echo "\n";
//--------------
// 연관배열 : 사용자가 할당한 키를 사용하는 배열(php에서 가장 많이 사용)
//--------------
$arr2=[
    "key1"=> 5000
    ,"key2" => "안녕하세용:)"
];
echo $arr2["key2"];

$arr2["key3"] = "뭐먹고싶음";
var_dump($arr2);

// ------------
// 다차원 배열
// ------------
$arr3 = [
    [1,2,3]
    ,[4,5,6]
    ,[7,8,9]
];

echo $arr3[0][0];
echo "\n";

//다차원 배열의 예
$result2 =[
    [
        "id" => 10001
        ,"name" => "홍길동"
    ]
    ,[
        "id" => 10002
        ,"name" => "갑순이"
    ]
    ,[
        "id" => 10003
        ,"name" => "갑돌이"
    ]
];

echo $result2[2]["name"];
echo "\n";
// --------------------------
// 배열에서 자주 사용하는 함수
// --------------------------
// count() : 배열의 길이(size)를 반환하는 함수
$arr4 = [2,5,98,8,10,5,9];
echo count($arr4);

//unset() : 해당하는 키의 요소 삭제

unset($arr4[1]);
var_dump($arr4);

// 배열의 정렬 함수
asort($arr4); //오름차순 정렬
var_dump($arr4);

arsort($arr4); //내림차순 정렬
var_dump($arr4);

$arr5 =[
    "d" => "1"
    ,"a" => "2"
    ,"c" => "3"
    ,"b" => "4"
];

ksort($arr5); //key 기준으로 오름차순 정렬
var_dump($arr5);

krsort($arr5); //key 기준으로 내림차순 정렬
var_dump($arr5);