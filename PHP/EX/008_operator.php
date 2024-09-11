<?php

// 대입연산자 : 값을 변수에 대입하는 연산자
$num = 1;

// 산술연산자 : 사칙연산과 나머지 구하는 기능을 하는 연산자

$num1 = 10;
$num2 = 5;

//  더하기 +
echo $num1 + $num2 ;
echo "\n" ;
// 빼기 -
echo $num1 - $num2 ;
echo "\n" ;
// 곱하기 *
echo $num1 * $num2;
echo "\n" ;
//  나누기 
echo $num1/$num2 ;
echo "\n" ;
// 나머지 구하기
echo $num1%$num2 ;
echo "\n" ;

$mul = 4 * 4 + 1 - (5+2);
echo $mul;

// 산술 대입 연산자
$tmp1 =0;
$tmp1 = $tmp1 +5 ;

// 더하기
$tmp1 += 5 ; // 산술대입연산자 사용

// 빼기
$tmp1 -= 5;

// 곱하기
$tmp1 *= 5;

// 나누기
$tmp1 /= 5;

// 나머지
$tmp1 %= 5;

// 문자열 연결
$str1 = "안녕";
$str1 .="하세요";
echo $str1;

// 산술대입 연산자를 이용해서 해봅시다.
$tng_num = 100;

// $tng_num에 10을 더해주세요.
$tng_num +=10;
echo $tng_num."\n";

// $tng_num을 5로 나누어주세요
$tng_num /=5;
echo $tng_num."\n";
// $tng_num에서 4를 빼주세요
$tng_num-=4;
echo $tng_num."\n";
// $tng_num를 7로 나눈 나머지를 구해주세요
$tng_num %=7;
echo $tng_num."\n";
// $tng_num에 3을 곱해주세요
$tng_num*=3 ;
echo $tng_num."\n";


// 증감 연산자 : 1을 더하거나 빼는 연산자
$num = 0;

// 후위 증감 연산자
$num++;
echo $num."\n";

// 전위 증감 연산자
$num =0;
++$num;
echo $num."\n";
++$num;
echo $num."\n";
echo ++$num."\n";
echo $num."\n";
echo "---------------------\n";

// 비교연산자 : 두값을 비교하는 연산자
var_dump(1>0);
var_dump(1<0);
var_dump(1>=0);
var_dump(1<=0);

$num =1;
$str ="1";

// 불완전비교 : 값만 비교
var_dump($num ==$str); 
var_dump($num !=$str); 

// 완전비교 : 값, 데이터 타입 둘다 비교
var_dump($num ===$str);
var_dump($num !==$str);

//  변수1==변수2  : 변수1과 변수2가 같다. (불완전비교, 데이터타입 체크X)
//  변수1===변수2  : 변수1과 변수2가 같다. (완전비교, 데이터타입 체크O)
//  변수1!=변수2  : 변수1과 변수2가 같지않다. (불완전비교, 데이터타입 체크X)
//  변수1!==변수2  : 변수1과 변수2가 같지않다. (불완전비교, 데이터타입 체크O)

//  논리연산자 : boolean 타입만 가지는 집합에서 사용하는 연산 (and연산자, or 연산자. !연산자)
// and 연산자
var_dump(1===1 && 2===1);

// or 연산자
var_dump(1===1|| 2 === 1);

// not연산자
var_dump(!(1===1));

// 삼항 연산자 : 조건식의 결과에 따라 다른 결과를 반환

$result = 1 ===1 ? "참입니다." : "거짓입니다.";
var_dump($result);
