<?php
// for 문 : 특정 처리를 반복적으로 구현하고자 할때 사용

// 0~5 까지 숫자 출력
// for($i=0; $i <6; $i++) {
//     //우리가 반복하고 싶은 처리
//     echo "숫자 : ".$i."\n";
// }

// break : 처리중에 break를 만나면 loop를 종료
// for($i=1; $i <6; $i++) {
//     if($i ===3) {
//         break;
//     }
//     //우리가 반복하고 싶은 처리
//     echo "숫자 : ".$i."\n";
// }


// for($i=1; $i <6; $i++) {
//     echo "숫자 : ".$i."\n";
    
//     if($i ===3) {
//         break;
//     }

// }

//continue문 : 처리중에 만나면 continue를 만나면 이후의 처리를 건너뛰고 다음 loop진행
// 짝수만
// for($i=1; $i <6; $i++) {
//     if(($i % 2 ) ===0) {
//         continue;
        
//     }
//     echo "숫자 : ".$i."\n";
    

// }

//구구단 2단 출력
for($x=1; $x <10; $x++ ) {
    //     if(($x * 2)) {
    //     continue;
    // }
    echo "2 x $x = \n";
}
echo "\n";

for($x=1; $x <10; $x++ ) {
    echo "2 X ".$x." = ".($x*2)."\n";
}

$dan =4;
for($x=1; $x <10; $x++ ) {
    echo $dan." X ".$x." = ".($dan*$x)."\n";
}
echo $x;

echo "\n";
echo "\n";
//------------------------------------
// 1부터 50까지 중에서 짝수의 합을 구하라
// for($y=1; $y<=50; $y++) {
//     if(($y%2)===0)
//     continue;
//     echo ($y+=$y)."\n";
// }
$base=0;
for($y=1; $y<=10; $y++) {
    if(($y%2)===0) {
        $base += $y;
    }
}
echo $base;

// $res=0;
// for($a=0; $a<=100; $++) {
//     $res += $a;
// }


echo "\n";
echo "\n";

// -------------------
// 다중 루프문
// -------------------
for($i=1; $i <3; $i++) {
    echo "바깥 루프문 : ".$i."\n";
    for($z = 1; $z <3; $z++) {
        echo "안쪽 루프문 : z값은 = ".$z.", i값= ".$i."\n";
    }

}
echo "\n";
echo "\n";
// 구구단 2~9단
// for($dan=2; $dan<=9; $dan++) {
//     echo "**".$dan."단**\n";

//     for($multi = 1; $multi <=9; $multi++) {
//         echo $dan." X ".$multi." = ".($dan*$multi)."\n";

//     }
// }

// 아래처럼 별을 찍어주세요
// *****
// *****
// *****
// *****
// *****

echo "\n";
echo "\n";
for($star=1; $star<6; $star++) {
    echo "*****".$star."\n";
}
echo "\n";
echo "\n";

for($star=1; $star<6; $star++) {
    for($star=1; $star<6; $star++) {
    echo "*";
}
echo "*\n";
}

// *
// **
// ***
// ****
// *****
echo "\n";
echo "\n";
for($star1=1; $star1<2; $star1++) {
    echo "*\n";
    for($star2=1; $star2<5; $star2++) {
        echo "**";
    }
    // echo "*";
}
echo "\n";
echo "\n";
for($i=1; $i<=5; $i++) {
    for($z=1; $z <=$i; $z++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";
echo "\n";
//     *
//    **
//   ***
//  ****
// *****


// 구구단 6단
for($a=1; $a<10; $a++) {
    echo "6 X ".$a." = ".($a*6)."\n";

}
