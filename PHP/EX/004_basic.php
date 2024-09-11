<?php

//  변수(Variable) > 숫자가 아니라 다른것도 다 포함가능

$dan = 6;

echo "$dan x1 =2\n";
echo "$dan x2 =4\n";
echo "$dan x3 =6\n";
echo "$dan x4 =8\n";
echo "$dan x5 =10\n";

// 변수선언
$num ;

// 변수 초기화 < 변수를 선언하고 최초로 값을 부여하는것. 선언과 초기화가 진행되어야 변수로서 사용가능
$num = 1;

// 변수 선언 및 초기화
$str = "가나다";

// 네이밍 기법
//  스네이크 기법
$user_name;

// 카멜 기법
$userName;

// 상수 : 절대 변하지 않는 값
define("AGE", 20);
echo AGE;
//  define("AGE",30);  
//  이미 선언된 상수이므로 Warning 이 일어나고 값이 바뀌지 않는다

$name = "미어캣";
echo $name;
$name = "고양이";
echo $name;

// underscore 표기법
$num = 10_000_000;
echo "$num\n" ;

// 아래처럼 변수 값을 담아서 출력해 주세요.
// 점심메뉴
// 탕수육 8,000
// 짜장면 6,000
// 짬뽕 6,000

$lunch = "점심메뉴\n";
$menu1 ="탕수육 8,000\n";
$menu2 = "짜장면 6,000\n";
$menu3 = "짬뽕 6,000\n";

echo "$lunch ";
echo "$menu1 ";
echo "$menu2 ";
echo "$menu3 ";

// o

echo $lunch, $menu1, $menu2, $menu3 ;

// 두변수의 스왑

$num1 =200;
$num2 =10;
$tmp;

$tmp = $num1;
$num1 =$num2 ;
$num2 =$tmp ;
echo $num1, $num2 ;

//  데이터 타입
// int : 정수
$num =1;
var_dump($num);

// float, double : 실수
$double = 3.141592 ;
var_dump($double);

// string : 문자열
$str = "abc가나다";
var_dump($str);

// boolean : 논리
$boo = true;
var_dump($boo);

// null: 널
$null = null;
var_dump($null);

//  array : 배열
$arr = [1,2,3];
var_dump($arr);

// object : 객체
$obj = new DateTime();
var_dump($obj);

// 형변환
$casting = (string)$num;
var_dump($casting);