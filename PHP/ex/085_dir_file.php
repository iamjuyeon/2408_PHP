<?php
//------------
//디렉토리 생성
// $mkdir_result = mkdir("./my_dir");
// if($mkdir_result) {
//     //정상일 경우 처리
// } else {
//     //실패일 경우 처리
// }

// //------------
// // 디렉토리 존재 유무 체크
// $check_result = is_dir("./my/dir");
// if($check_result) {
//     echo "있다";
// } else {
//     echo "없다";
// }

//------------
// 디렉토리 열기 및 읽기
// $open_result = opendir("./my_dir"); //디렉토리 열기

// while($item = readdir($open_result)) {
//     echo $item."\n";
// }
// //-------------
// //디렉토리 닫기
// closedir($open_result); 

//--------------
//디렉토리 삭제
// rmdir("./my_dir"); //파일은 삭제 안됨

//------------
//파일 열기
$file = fopen("./my_dir/test.txt", "a"); //폴더에 파일이 없으면 파일을 생성
if($file) {
    //파일 열기 성공시 처리
    fwrite($file, "떡복이"); //파일에 쓰기
} else {
    //파일 열기 실패시 처리
    echo "파일 열기 실패";
}

//파일 닫기
fclose($file);

//파일 삭제
unlink("./my_dir/test.txt");