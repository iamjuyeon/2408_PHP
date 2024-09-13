<?php
// 변수 (variable)
$dan = 5; // 사실상 자동 완성 기능 

echo "$dan x 1 = 2\n";
echo "$dan x 2 = 4\n";
echo "$dan x 3 = 6\n";
echo "$dan x 4 = 8\n";
echo "$dan x 5 = 10\n";

// 변수 선언
$num;


// 변수 초기화
$num = 1;

// 변수 선언 및 초기화
$str = "가나다";

// 네이밍 기법
// 스네이크 기법
$user_name;

// 카멜 기법
$userName;

$name="강아지";
echo $name;
$name="고양이"; 
echo $name;

// 상수
define("AGE", 20);
echo AGE;

// define("AGE", 30); // 이미 선언된 상수이므로 warning이 일어나고 값이 바뀌지 않는다
echo AGE;

// literal

// underscore 표기법(회계)
$num = 10_000_000;

echo "$num\n";

// 변수값 출력
// 점심메뉴
$name1="점심메뉴";
$name2="탕수육 8,000";
$name3="짜장면 6,000";
$name4="짬뽕 6,000";

echo "$name1\n";
echo "$name2\n";
echo "$name3\n";
echo "$name4\n";

echo $name1, $name2, $name3, $name4;

// $num1=8_000;
// $num2=6_000;

echo "점심메뉴 \n";
echo "탕수육 $num1\n";
echo "짜장면 $num2\n";
echo "짬뽕 $num2\n";

echo "점심메뉴 \n";
echo '<br>';
echo '<br>';
echo '<br>';
// 변수 스왑
$num1=200;
$num2=10;
$tmp;

// num1 num2 값 바꾸는 중
$tmp = $num1;
$num1 = $num2;
$num2 = $tmp;
echo $num1, $num2;


// ------------------------
// 데이터 타입
// ------------------------
// int
$num = 1;
var_dump($num);

// float, double : 실수
$double = 3.142592;
var_dump($double);

$float = 3.141592;
var_dump($num);

$num = 3.141592;
var_dump($num);

// string : 문자열
$str = "abc가나다";
var_dump($str);

// boolean : 논리
$boo = true;
var_dump($boo);

//  null 
$null = null;
var_dump($null);

// array
$arr = [1,2,3];
var_dump($arr);

// object
$obj = new DateTime();
var_dump($obj);

// 형변환(사실상 숫자를 문자로 바꿈)
$casting = (string)$num;
var_dump($casting);  // 문자는 숫자로 변경 불가능