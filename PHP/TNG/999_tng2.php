<?php
// 가위바위보 게임
// 게임실행시 가위 바위 보 중에 하나를 ㄹ입력
// 컴퓨터는 랜덤으로 가위 바위 보 중 하나를 출력
//  결과출력
//  유저 : 가위
//  컴퓨터 : 바위
//  졌습니다 or 이겼습니다 출력
fscanf(STDIN, "%s\n", $input);
// echo $input;

// $rsp = rand(1,3);

// switch ($rsp) {
//     case 1 :


// }

$rsp = rand(1,3);

switch ($rsp) {
    case 1 :
        echo "컴퓨터 : rock 유저:".$input."\n";
        if ($input === "rock"){
            echo " 비겼습니다.\n";
        }else if ($input === "scissors") {
            echo " 이겼습니다\n";
        }else {
            echo "졌습니다.\n";
        }
        break;
    case 2 :
        echo "컴퓨터 : scissors 유저:".$input."\n";
        if ($input === "paper"){
            echo " 이겼습니다.\n";
        }else if ($input === "scissors") {
            echo " 비겼습니다\n";
        }else {
            echo "졌습니다.\n";
        }
        break;
    case 3 :
        echo "컴퓨터 : paper 유저:".$input."\n";
        if ($input === "rock"){
            echo " 이겼습니다.\n";
        }else if ($input === "scissors") {
                echo " 졌습니다\n";
        }else {
                echo "비겼습니다.\n";
        }
        break;
}
 
