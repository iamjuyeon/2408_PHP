<?php
define("My_MARIADB_HOST", "localhost");
define("My_MARIADB_PORT", "3306");
define("My_MARIADB_USER", "root");
define("My_MARIADB_PASSWORD", "php504");
define("My_MARIADB_NAME", "book_club");
define("My_MARIADB_CHARSET", "utf8mb4");
define("MY_MARIADB_DSN", "mysql:host=".My_MARIADB_HOST.";port=".My_MARIADB_PORT.";dbname=".My_MARIADB_NAME.";charset=".My_MARIADB_CHARSET);

// **php path 관련 설정**
// 슈퍼 글로벌 변수 : $_대문자 (전역에서 사용할 수 있음)
define("MY_PATH_ROOT", $_SERVER["DOCUMENT_ROOT"]."/"); //웹서버 document root (아파치 웹서버의 htdocs)

define("MY_PATH_ERROR", MY_PATH_ROOT."error.php"); //에러 페이지

define("MY_PATH_DB_LIB", MY_PATH_ROOT."lib/db_lib.php"); //DB 라이브러리

// ----------------------
// ** 발제문 게시판 로직 관련 설정 ***
// -------------------------------------
define("MY_LIST_COUNT", 6);
define("MY_PAGE_BUTTON_COUNT", 10);


// -------------------------------------
// *** 인상깊은 문장 게시판 로직 관련 설정 ***
// ------------------------------------

define("SENTENSE_LIST_COUNT", 7);
define("SENTENSE_BUTTON_COUNT",3);