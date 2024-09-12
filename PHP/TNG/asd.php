<?php
//1부터 100개의 숫자를 생성
for ($i=1 ; $i <= 100 ; $i++) {
    $num[$i] += $i;
}
echo "1개의 랜덤 수 : ".array_rand($num,1);
echo "<Br>";
echo "2개의 랜덤 수 : ".implode(",",array_rand($num,6));
