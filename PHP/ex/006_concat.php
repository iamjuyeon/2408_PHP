<?php
// 연결 연산자 : 문자와 문자를 연결
$str1 = "안녕, ";
$str2 = "PHP!!";
$concat1 = $str1.$str2."ㅎㅎㅎㅎ\n";

echo $concat1;
echo $str1, $str2; // 문자열 2개를 출력하고 싶은데 하나하나 다 적기 싫으니까 출약한거

$str3 = "안녕";  // '\' escape 문자
$str4 = "하세요";
$concat2 = $str3.$str4."~"; // 문자열 2개를 합친거

echo $concat2;

