<?php

// 다른 파일의 소스코드를 불러오는 방법
//include : 해당 파일을 불러온다
// // 공통점 : 오류가 발생해도 프로그램을 정지하지 않고 처리 진행
include_once("./070_include2.php"); // 중복방지
include_once("./070_include2.php");


//require : 해당 파일을 불러온다
//require_once : 중복방지
// 공통점 : 오류가 발생하면 프로그램을 정지
// require("./070_include2.php");
echo "include 111\n";


