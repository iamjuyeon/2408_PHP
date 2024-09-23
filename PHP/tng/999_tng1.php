<?php
//구구단
// **** 2단 ****
// 2 X 1 = 2

// $data = [1,2,3,4,5,6,7,8,9];

// foreach($data as $level => $number) {
//     // for($level=2; $level>10; $level++) {
        
//     // }
//     if($level)
//     echo $level." X ".$number." = ".($number*2)."\n"; 
// }

// echo "\n";
// echo "\n";

// for($a=2; $a<10; $a++) {
//     echo "**** ".$a."단 ****\n";
//     for($b=1; $b<10; $b++) {
//         echo "$a X ".$b." = ".($b*$a)."\n";
//     }

// }

//두수를 더해서 값을 반환하는 함수
// function sum($x, $y = 10): int{
//     return $x + $y;
// }
// //타입힌트 :파라미터 데이터 타입에 제약
// echo sum(1);

//리턴에 데이터타입 제약
// function sum1($x, $y):int {
//     return $x + $y;
// }

//------------------------
// 예외 처리
// try {
// //  5/0;
// } catch(Throwable $th) {
//     echo $th->getMessage();

// } finally {
//     //예외의 발생여부와 상관없이 항상 실행 할 처리
//     echo "파이널리";
// }
// echo "처리끝";

//중복해서 쓰는 경우
// try {
//     echo "바깥쪽 try\n";
    
//     try {
//         5/0;
//         echo "안쪽 try\n";
//     } catch(Throwable $th) {
//         echo "안쪽 catch\n";
//         5/0; //바깥쪽 try 영역
//     }
// } catch(Throwable $th) {
//     echo "바깥쪽 catch\n";
// }

//강제예외 처리 
// try {
//     throw new exception("강제예외발생");
// } catch(Throwable $th) {
//     echo $th->getMessage();
// }



//    *
//   ***
//  *****
// *******
for($tree=1; $tree<5; $tree++) {
    for($star=1; $star <=$tree; $star++) {
        echo "*";
    }
    echo "\n";
}





for($tree=1; $tree<5; $tree++) {
    for($star=1; $star<11; $star++) {
        if($star<=(5-$tree) || $star>=(5+$tree)) {
            echo " ";
        } else {
            echo "*";
        }
    }
    echo "\n";
}

for($a=1; $a<10; $a++) {
    for($b=10; $b>1; $b--) {
        if($b<$a) {
            echo "*";
        } else {
            echo " ";
        }
    } echo "\n";
}

for($z=1; $z<3; $z++){
    for($x=3; $x>0; $x--){

        echo $z."--".$x."\n";
}
}

// *****
// ****
// ***
// **
// *

for($q=1; $q<6; $q++) {
    for($p=5; $p>0; $p--) {
        if($p>=$q) {
            echo "*";
        } else {
           echo " ";
        }
} echo "\n";
}

// ******
//  *****
//   ****
//    ***
//     **
//      *

for($t=1; $t<6; $t++) {
    for($g=6; $g>0; $g--) {
        if($g>$t) {
            echo " ";
        } else {
            echo "*";
        }
    } echo "\n";
}

