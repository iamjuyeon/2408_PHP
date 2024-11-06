<?php
// echo 'index Start';
require_once('./config.php'); //설정 파일 불러오기
require_once('./autoload.php');//오토로드 파일 불러오기

// echo 'Route Call';
new Route\Route();//라우터 호출
// echo 'end';