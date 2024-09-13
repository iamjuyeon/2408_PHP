<?php
//if문 : 조건에 따라서 서로 다른 처리를 할때 사용하는 문법
$num = 7;
if($num ===10) {
    echo "10입니다!!\n";
} else if($num ===5) {
    echo "5입니당~~!!\n";
} else if($num ===7) {
    echo "럭키><\n";
} else {
    echo "숫자입니다하하하\n";
}

//1이면 1등 2면 2등, 3이면 3등 나머지 순위 외 5는 특별상

$num1=10;
if($num1 ===1) {
    echo "추카추카 1등입니당 짱먹으셈\n";
} else if($num1 ===2) {
    echo "따흣 아쉽 2등이요\n";
} else if($num1 ===3) {
    echo "3---등\n";
} else if($num1 ===5) {
    echo "당신은 특별해~ 특별상!!\n";
} else {
    echo "순위 외\n";
} 
//else if($num1 ===4 ||$num1 ===5) {
//    echo "당신은 특별해~ 특별상!!\n";
//4또는 5일때

//1번 문제 정답은2, 2번문제 정답은5
//두개 다 맞으면 100점
//하나만 맞으면 50점
// 다틀리면 0점


$answer1=2;
$answer2=5;

if($answer1 ===2 && $answer2 ===5) {
    echo "100점";
} else if ($answer1 ===2 || $answer2 ===5) {
    echo "50점";
} else {
    echo "0점";
}