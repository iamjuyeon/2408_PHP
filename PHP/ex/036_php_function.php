<?php
// php 내장 함수

// trim(문자열) : 문자열의 좌우 공백을 제거해서 반환
$str = "미어캣 ";
echo trim($str);

// strtoupper(문자열),strtolower(문자열) : 문자열을 대/소문자로 변환해서 반환
$str2 = "AbcDe";
echo strtoupper($str2);
echo strtolower($str2);

echo "\n";

// ---------------------
$str3 = "미어캣";
echo strlen($str3);  // 
echo mb_strlen($str3); // 문자열의 길이를 반환, 멀티바이트 문자열에 대응, 거의 이것만 사용

echo "\n";
// ---------------------

// str_replace(문자열) : 특정 문자를 치환해서 반환
$str4 ="key: 255dfdfdfdvfdf";
echo str_replace("key: ", "", $str4);

echo "\n";
// ---------------------

// mb_substr(대상, 삭제 개수, 출력 개수) : 문자열을 잘라서 반환
$str5="php입니다.";
echo mb_substr($str5, 3, 2); //좌측 기준
echo "\n";
echo mb_substr($str5, -3, 1); //

echo "\n";
// ---------------------
// mb_strpos(대상문자열, 검색할 문자열) : 검색할 문자열의 특정 위치를 반환
$str6 = "점심 뭐먹지?";
echo mb_strpos($str6, "뭐");
echo "\n";

// "뭐"부터 3글자 잘라오기
echo mb_substr($str6, mb_strpos($str6, "뭐"), 3);

echo "\n";
// ---------------------
//sprintf(포맷문자열, 대입문자열1, 대입문자열2...) : 포맷문자열에 대입문자열을 순서대로 대입해서 반환
$str_format = "당신의 점수는 %s점입니다. <%s>";
//양수:%u
//음수:%d
//실수:%f
echo sprintf($str_format, "B","A");

echo "\n";
// ---------------------
// isset(변수) : 변수 설정 여부 확인(true/false)
$str7 ="";
$str8 = null;
var_dump(isset($str7));
var_dump(isset($str8));
var_dump(isset($no));

echo "\n";
// ---------------------
// empty(변수) : 변수의 값이 비어있는지 확인(true/false)
$empty1 = "abc";
$empty2 = ""; //비어있는 문자열
$empty3 = 0; // 숫자로 취급안함
$empty4 = []; // []안에 비어있어서
$empty5 = null; // 
var_dump(empty($empty1));
var_dump(empty($empty2));
var_dump(empty($empty3));
var_dump(empty($empty4));
var_dump(empty($empty5));

echo "\n";
// ---------------------
// is_null(변수) : 변수가 null인지 아닌지 확인(true/false)
$chk_null = null;
var_dump(is_null($chk_null));

echo "\n";
// ---------------------
// gettype(변수) : 변수의 데이터 타입을 문자열로 반환
$type1 = "abc";
$type2 = 0;
$type3 = 1.2;
$type4 = [];
$type5 = true;
$type6 = null;
$type7 = new DateTime();

echo gettype($type1)."\n";
echo gettype($type2)."\n";
echo gettype($type3)."\n";
echo gettype($type4)."\n";
echo gettype($type5)."\n";
echo gettype($type6)."\n";
echo gettype($type7)."\n";

// 타입 체크 방법 예시
if(gettype($type1) ==="integer") {
    echo "숫자임";
}

echo "\n";
// ---------------------
// settype(변수, 데이터타입) : 변수의 데이터 타입 변환
$type8 = "1";
// var_dump((int)$type8); //원본은 변경하지 않고, 일시적으로 캐스팅(변환)
settype($type8, "int"); // 원본의 데이터 타입을 변환
var_dump($type8);

echo "\n";
// ---------------------
// time() : 현재시간 (타임스탬프 초단위)
echo time(); //1970-01-01 부터 시간 시간 (초단위)

echo "\n";
// ---------------------
// date(시간포캣, 타임스탬프값,) : 시간포맷 형식으로 문자열을 반환
echo date("Y-m-d H:i:s", time()); //H : 24시 기준 , h : 12시 기준

echo "\n";
// ---------------------
// ceil(변수), round(변수), floor(변수) : 올림, 반올림, 버림
echo ceil(1.2)."\n";
echo round(1.5)."\n";
echo floor(1.8)."\n";

echo "\n";
// ---------------------
// random_int(시작값, 끝값) : 시작값부터 끝값까지 랜덤한 숫자를 반환
echo random_int(1, 10); 