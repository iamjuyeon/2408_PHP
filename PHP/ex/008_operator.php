<?php
// 대입 연산자 : 값을 변수에 대입하는 연산자
$num = 1;    // '=' : 대입연산자

// 산술 연산자 : 사칙연산과 나머지 구함
$num1 = 10;
$num2 = 5;

// 더하기
echo $num1 + $num2;
echo "\n";
// 빼기
echo $num1 - $num2;
echo "\n";
// 곱하기
echo $num1 * $num2;
echo "\n";
// 나누기
echo $num1 / $num2;
echo "\n";
// 나머지
echo $num1 % $num2;

$mul = 4 * 4 + 1 - (5+2);

// 산술 대입 연산자
$tmp1 = 0;

// $tmp1 = $tmp +5;
$tmp1 += 5; // 산술대입연산자 :  $tmp1 = $tmp +5; 이걸 줄여쓴거

// 빼기

$tmp1 -=5;

// 곱하기\
$tmp1 *=5;

// 나누기
$tmp1 /=5;

// 나머지
$tmp1 %=5;

$str1 = "안녕";
$str1.="하세요";
echo $str1;
echo "\n";

// 산술 대입 연산자 연습
$tng_num = 100;

echo "\n";
// 10 더하기
$tng_num +=10;
echo $tng_num;
echo "\n";
// 5 나누기
$tng_num /=5;
echo $tng_num;
echo "\n";
//4 뺴기
$tng_num -=4;
echo $tng_num;
echo "\n";
// 7나누고 나머지
$tng_num %= 7;
echo $tng_num;
echo "\n";
//3곱하기
$tng_num *=3;
echo $tng_num."\n"."\n";


// 증감 연산자 : 1을 더하거나 빼거나
$num = 0;

// 후위 증감 연산자
$num++;
echo $num."\n";
$num++;
echo $num."\n";
echo $num++."\n";
echo $num."\n";
echo "---------------------\n";
// 전위 증감 연산자
$num=0;
++$num;
echo $num."\n";
++$num;
echo $num."\n";
echo ++$num."\n";
echo $num."\n";
echo "---------------------\n";

// ----------------------------------------
// 비교 연산자:두개 값을 비교하는 연산자
// -----------------------------------------
var_dump(1 > 0);
var_dump(1 < 0);
var_dump(1 >= 0);
var_dump(1 <= 0);

$num = 1;
$str = 1;
// 같다
var_dump($num == $str); //불완전 비교 : 값만 확인
var_dump($num === $str); //완전 비교 : 값+데이터타입 확인

//같지 않다
var_dump($num != $str); //불완전 비교 : 값만 확인
var_dump($num !== $str); //완전 비교 : 값+데이터타입 확인

// --------------------------------------
// 논리 연산자: 값이 boolean 타입만 가지는 집합에서 사용하는 연산(and, or, !)
// ---------------------------------------
var_dump(1 ===1 && 2===1); // && = and

var_dump(1 ===1 || 2===1); // || = or

var_dump(!(1 ===1)); //참이지만 거-짓으로 나옴 만우절 이벤트

//----------------------------
// 삼항 연산자
//-----------------------------
$result = 1 === 1? "참입니다." : "거짓입니다.";
var_dump($result);

// a

$num=0;
$num++;
echo $num."\n";
$num++;
echo $num."\n";
echo $num++."\n";
echo $num."\n";

