<?php
// $stdin = fopen("php://stdin", "r");
// $input = fread($stdin, 1024);
// fclose($stdin);
// echo $input;

//가위바위보 게임
//게임 실행시 "가위" "바위" "보" 입력
//컴퓨터는 랜덤으로 "가위" "바위" "보" 출력
//결과 출력
//유저 : 가위
//컴퓨터 : 바위
//졌습니다. or 이겼습니다.

fscanf(STDIN, "%s/d", $input);

// $randgame=rand(1,3);
// if($randgame === $input) {
//     $ans ="비겼습니다\n";
// } else if($randgame < $input) {
//     $ans= "이겼어요\n";
// } else if ($rnadgame > $input) {
//     $ans = "졌습니다\n";
// }
// echo "유저 : ".$input."\n"."컴퓨터 : ".$randgame."\n".$ans;

$randgame = rand(1,3);

switch($randgame) {
    case 1 :
        echo "유저 : ".$input."\n컴퓨터 : rock";
        if($input === "rock") {
            
         echo "\n비겼습니다.";

        }
        else if($input === "scissors") {
            echo "\n이겼습니다.";

        }
        else if($input === "papper") {
            echo "\n졌습니다.";

        }
        break;
    case 2 :
        echo "유저 : ".$input."\n컴퓨터 : scissors";
        if($input === "scissors") {
            echo "\n비겼습니다.";

        }
        else if($input === "rock") {
            echo "\n이겼습니다.";

        }
        else if($input === "papper") {
            echo "\n졌습니다.";

        }
        break;
    case 3 :
        echo "유저 : ".$input."\n컴퓨터 : papper";
        if($input === "papper") {
            echo "\n비겼습니다.";

        }
        else if($input === "scissors") {
            echo "\n이겼습니다.";

        }
        else if($input === "rock") {
            echo "\n졌습니다.";

        }
        break;
}


