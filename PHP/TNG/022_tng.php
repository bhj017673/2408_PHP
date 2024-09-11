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

$score =69;

if($score === 100) {
    echo "당신의 점수는 $score 점 입니다. A+\n";
} else if($score >=90 && $score <100) {
    echo "당신의 점수는 $score 점 입니다. A\n";
}else if($score >=80 && $score <90) {
    echo "당신의 점수는 $score 점 입니다. B\n";
}else if($score >=70 && $score <80) {
    echo "당신의 점수는 $score 점 입니다. C\n";
}else if($score >=60 && $score <70) {
    echo "당신의 점수는 $score 점 입니다. D\n";
} else {
    echo "당신의 점수는 $score 점입니다. F\n";
}

// 어짜피 다 반복이라 나머지도 변수 처리하기 효율+유지보수
// 그리고 위의 &&는 안적어도됨 위의 조건에서 걸러지기 때문


$score = 62;
$grade= "";
if($score >=0 && $score <=100) {
    if($score===100) {
        $grade ="A+";
    }else if($score >=90 ) {
        $grade="A";
    }else if($score >=80) {
        $grade="B";
    }else if($score >=70) {
        $grade="C";
    }else if($score >=60) {
        $grade="D";
    }else {
        $grade="F";
    }
    echo "당신의 점수는".$score."점 입니다.<".$grade.">";
}
