<?php

// if 문 사용시
$food = "떡볶이";

if($food === "떡볶이") {
    echo "한식\n";
} else if ($food === "짜장면") {
    echo "중식\n";
}else if ($food === "햄버거") {
    echo "양식\n";
}

// switch 문 

$food = "짬뽕";

switch($food) {
    case "떡볶이" :
        echo "한식\n";
        break;
    case "짬뽕" :
    case "짜장면" :
        echo "중식\n";
        break;
    case "햄버거":
        echo "양식\n";
        break;
    default :
        echo "맛있음\n";
        break;
}

// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그외는 노력상

$rank = "4등";

switch($rank) {
    case "1등":
        echo "금상\n";
        break;
    case "2등":
        echo "은상\n";
        break;
    case "3등";
        echo "동상\n";
        break;
    case "4등":
        echo "장려상\n";
        break;
    default :
        echo "노력상\n";
        break;
}