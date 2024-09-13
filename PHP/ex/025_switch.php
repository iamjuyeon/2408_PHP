<?php

$food = "차돌박이짬뽕";

// if($food ==="떡볶이") {
//     echo "한식\n";
// } else if($food ==="자장면") {
//     echo "중식\n";
// } else if($food ==="햄버거") {
//     echo "양식\n";
// }

// 스위치 1:1로 매칭되는 것만 사용 if는 범위
switch($food) {
    case "떡복이":
        echo "한식";
        break;
    case "짬뽕":  //다중선택
    case "자장면":
        echo "중식";
        break;
    case "햄버거":
        echo "양식";
        break;
    default:
        echo "먹고싶다";
        break;
}
echo "\n";
//1등 금상, 2등 은상, 3등 동상, 4등 

$rank ="5등";

switch("true") {
    case"true":

    //여기안에 switch 문 들어감        
}


switch($rank) {
    case "1등":
        echo "금상";
        break;
    case "2등":
        echo "은상";
        break;
    case "3등":
        echo "동상";
        break;
    case "4등":
        echo "장려상";
        break;
    default:
        echo "노력상";
        break;
}