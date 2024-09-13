<?php
// 1. 3의 배수 게임
// 1,2,짝, 4,5,짝 ,7,8,짝

// 짝수만
// for($i=1; $i <6; $i++) {
//     if(($i % 2 ) ===0) {
//         continue;
        
//     }
//     echo "숫자 : ".$i."\n";

// }


// for($num=1; $num<101; $num++) {

//     if(($num %3)===0) {
//         echo "짝\n";
//     }

//     else {
//         echo $num.", ";

//     }
// }


for($num=1; $num<101; $num++) {

    if(($num %3)===0) {
        echo "짝\n";
    }

    else if($num===100)
        echo $num;
    
    else {
        echo $num.", ";

    }
}

// for($num=1; $num<101; $num++) {
//     if(($num %3)===0) {
//         continue;
//         echo "짝\n";
//     }

//         // echo $num.", ";

// }


// 2. 반복문 사용 급여 5000이상, 성별이 남자인 사원 id와 이름 출력
// id : 1, name : 미어캣

$arr = [
    ["id" => 1, "name" => "미어캣", "gender" => "M", "salary" => "6000"]
    ,["id" => 2, "name" => "홍길동", "gender" => "M", "salary" => "3000"]
    ,["id" => 3, "name" => "갑순이", "gender" => "F", "salary" => "10000"]
    ,["id" => 4, "name" => "갑돌이", "gender" => "M", "salary" => "8000"]
];
echo "\n";
echo "\n";
foreach($arr as $key => $val) {
    if(($val["gender"])==="M" && ($val["salary"])>=5000) {
        
        echo "id : ".$val["id"].", name : ".$val["name"]."\n";
    }
}
