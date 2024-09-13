<?php
// IF로 만들어주세요.
// 성적
// 범위 :
//      100   : A+
//      90이상 100미만 : A
//      80이상 90미만 : B
//      70이상 80미만 : C
//      60이상 70미만 : D
//      60미만: F
// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

$grade=100;
if($grade ===100) {
    echo "올~~당신의 점수는 $grade 점 입니다. <A+>\n";
} else if($grade >= 90 && $grade < 100) {
    echo "당신의 점수는 $grade 점 입니다. <A>\n";
} else if($grade >= 80 && $grade < 90) {
    echo "당신의 점수는 $grade 점 입니다. <B>\n";
} else if($grade >= 70 && $grade < 80) {
    echo "아..당신의 점수는 $grade 점 입니다. <C>\n";
} else if($grade >= 60 && $grade < 70) {
    echo "엥??당신의 점수는 $grade 점 입니다. 재수강 각 <D>\n";
} else {
    echo "??? 당신의 점수는 $grade 점 입니다. 학사경고 받는거아님? <F>";
}

//echo "당신의 점수는 $grade 점 입니다. <$rank>";

echo "\n";
// -----------------------------------
$grade=100;
$rank = "";
if($grade ===100) {
    $rank = "A+";
} else if($grade >= 90 && $grade < 100) {
    $rank = "A";
} else if($grade >= 80 && $grade < 90) {
    $rank = "B";
} else if($grade >= 70 && $grade < 80) {
    $rank = "C";
} else if($grade >= 60 && $grade < 70) {
    $rank = "D";
} else {
    $rank = "F";
}

echo "당신의 점수는 $grade 점 입니다. <$rank>";

echo "\n";

$grade=100;
$rank = "";
if($grade >=0 && $grade <= 100) {

    if($grade ===100) {
        $rank ="A+";
    } else if($grade >=90) {
        $rank = "A";
    } else if($grade >=80) {
        $rank = "B";
    } else if($grade >=70) {
        $rank = "C";
    } else if($grade >=60) {
        $rank = "D";
    } else {
        $rank = "F";
    }
    echo "당신의 점수는 $grade 점 입니다. <$rank>";
}

