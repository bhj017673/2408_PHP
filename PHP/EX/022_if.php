<?php

// if문 : 조건에 따라서 서로 다른 처리를 할때 사용하는 문법

$num =7;
if($num === 10) {
    echo "10입니다!\n";
} else if ($num === 5) {
    echo "5입니다!\n";
} else {
    echo "숫자입니다!\n";
}

$num1 = 5 ;
if($num1 === 1) {
    echo "1등\n";
} else if ($num1 === 2){
    echo "2등\n";
} else if ($num1 === 3) {
    echo "3등\n";
} else if ($num1 === 5) {
    echo "특별상\n";
} else {
    echo "순위 외\n";
}

// 1번문제의 정답은 2, 2번문제의 정답은 5
// 1번 문제와 2번 문제 모두 정답이면 100점, 
// 둘중 하나만 정답이면 50점
//  모두 오답이면 0점을 출력

$answer =2;
$answer =5;

if($answer1 === 2 && $answer2 ===5) {
    echo "100점";
} else if ($answer1 ===2 || $answer ===5) {
    echo "50점";
} else {
    echo"0점";
}