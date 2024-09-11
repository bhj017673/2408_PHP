<?php
//  foreach :배열을 편하게 루프하기 위한 반복문

$arr = [1,2,3];
foreach($arr as $key=> $val) {
    echo "key".$key.", value : ".$val."\n";
}

$arr2 =[1, 2, 3, 4, 5, 6, 7, 8,9];

foreach($arr2 as /* $key => */ $val) {
    echo " 2 X ".$val." = ".($val*2)."\n";
}

// 연관배열의 경우
$arr3 = [
    "name" => "meerkat"
    ,"age" => 20
    ,"gender" => "M"
];

foreach($arr3 as $key => $val) {
    echo $key.":" .$val."\n";
}

$result=[
    ["id"=>1, "name"=> "미어캣", "gender"=>"M"]
    ,["id"=>2, "name"=> "홍길동", "gender"=>"M"]
    ,["id"=>3, "name"=>"갑순이", "gender"=>"F"]
];

foreach($result as $key =>$item) {
    echo $item["name"]."\n";
}