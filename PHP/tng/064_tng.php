<?php 
//로또 번호 생성
//1~45 6자리 랜덤 번호 중복안됨

// random_int(시작값, 끝값) : 시작값부터 끝값까지 랜덤한 숫자를 반환
echo random_int(1, 10); 


echo "\n";
function test($param_str, ...$arr_str) {
    $str = "";
    foreach($arr_str as $val) {
        $str .=$val;
    }
    $str .= $param_str;
    echo $str;
}
test("젤뒤", "a", "b", "c");
echo "\n";

// $arr = [1,2,3];
// foreach($arr as $key => $val) {
//     echo "key : ".$key.", value : ".$val."\n";

// }

function lotto() {
    
}

// $lotto = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45];
// foreach($lotto as $win) {
//     $win = array_rand($lotto);
//     $lotto[$win];
//     if($lotto[$win]!==$lotto[$win]) {
//         $lotto[$win].=$lotto[$win];
//         continue;
//     }
//     if($lotto[$win]===$lotto[$win]) {
//         break;
//     }
//     echo $win;
//     }


// unset($arr4[1]);
// var_dump($arr4);
// $get_number = [];
// for($i = 0; $i <6; $i++) {
//     $random_num = random_int(0,44);
//     $random_pick = ;
// }

$lotto = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45);
for($i=1; $i<7; $i++) {
    $randomKey = array_rand($lotto);
    // $win .= $lotto[$randomKey];
    // if($lotto[$randomKey]!==$lotto[$randomKey]) {
    //     continue;
    // }
    echo $lotto[$randomKey]." ";
    unset($lotto[$randomKey]);
}
echo "\n";

rand(1, 10);
echo rand(1, 10);
echo "\n";
$randNum = rand(1, 3);
$abc = "";

switch($randNum) {
    case 1 :
        $abc = "가위";
        break;
    case 2 :
        $abc = "바위";
        break;
    case 3 :
        $abc = "보";
        break;
    default :
        $abc = "";
        break;
}

echo $abc;