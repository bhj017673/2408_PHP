<?php
// 두 수를 전달해주면 합을 반환해주는 함수
// 외부에서 숫자를 받아드리는 값 = 파라미터 = $num1, $num2 = 인자
// 숫자 전달해주는 값 = 아규먼트 = 3, 5 = 인수

function my_sum($num1, $num2) {
    return $num1 + $num2;
}

my_sum(3, 5); //함수호출


// 두수를 받아서 -,/,*,% 의 결과를 리턴하는 함수를 만들어주세요

function for_minus($a, $b) {
    return $a - $b;
}
echo for_minus(10, 3)."\n";

function for_div($c, $d) {
    return $c / $d;
}
echo for_div (15,5)."\n";

function for_mult($e, $f) {
    return $e * $f."\n";
}
echo for_mult(2,9);

function for_perc($h, $i) {
    return $h % $i;
}
echo for_perc(10,4)."\n";

// 가변길이 아규먼트 :전달되는 모든 숫자를 더해서 반환
// //  ... 을 이용하는 방법(주의 : PHP5.6이상에서)
// function my_sum_all(...$numbers) {
//     $sum = 0;

//     foreach($numbers as $val) {
//         $sum +=$val;
//     }

//     return array_sum($numbers);
// }

// echo my_sum_all(4, 5, 8, 2, 3, 1);

// function my_sum_all() {
//     $numbers = func_get_args();

//     return array_sum($numbers);
// }

// echo my_sum_all(4, 5);

function test($param_str, ...$arr_str) {
    $str = "";
    foreach($arr_str as $val) {
        $str .= $val;
    }
    $str .= $param_str;
    echo $str;
}
test("젤뒤", "a", "B", "c");