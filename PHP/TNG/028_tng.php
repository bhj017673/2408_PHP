<?php

// 3의배수 게임 (100까지)
// 출력 예 ) 1, 2, 짝, 4, 5, 짝, 7, 8, 짝, 10...

$num=1;

for ( $num =1 ; $num <101 ; $num++) {
    if(($num%3) === 0){
        echo "짝, \n";
    } else {
        echo $num.", ";
    }
}

echo "\n";
echo "\n";
echo "\n";

$num=1;

for ( $num =1 ; $num <101 ; $num++) {
    if(($num%3) === 0){
        echo "짝, \n";
        continue ;
    } 
    echo $sum.", ";
}

echo "\n";
echo "\n";
echo "\n";

$num=1;

for ( $num =1 ; $num <101 ; $num++) {
    if(($num%3) === 0){
        echo "짝, ";
    } else if ($num!==100){
        echo$num.", ";
    } else {
        echo $num;
    }
}
echo "\n";
echo "\n";
echo "\n";

// 반복문을 이용하여 급여가 5000이상이고, 성별이 남자인 사원의 id와 이름을 출력해주세요.

$arr = [
    ["id" => 1, "name" => "미어캣", "gender" => "M" , "salary" => "6000"]
    ,["id" => 2, "name" => "홍길동", "gender" => "M" , "salary" => "3000"]
    ,["id" => 3, "name" => "갑순이", "gender" => "F" , "salary" => "10000"]
    ,["id" => 4, "name" => "갑돌이", "gender" => "M" , "salary" => "8000"]
];

foreach ($arr as $val)
    if(($val["salary"]>=5000) && $val["gender"]==="M") {
        echo "id : ".$val["id"].", name: ".$val["name"];
        echo "\n";
}