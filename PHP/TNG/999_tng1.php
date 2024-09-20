<?php

// 구구단

// for($item=2 ; $item <10 ; $item++) {
//     echo $item."단\n";
//     for($gugu = 1 ; $gugu <10 ; $gugu++) {
//         echo $item." X ".$gugu. " = ".($item * $gugu)."\n";
//     }
// }

// // 두수를 더해서 반환하는 함수
// // 타입힌트 - 파라미터로 전달받을 값에 제약을 두는것


// function sum(int $a,int $b) : int{
//     return($a + $b);
// }

// echo sum(11,56);

// 예외처리
// 통상적으로 예외 / 에러 가 있는데 발생시 프로그램이 멈춰버리고 이후 처리를 하지않아서, 
// 유저가 사용했을때 하얀화면에서 멈추거나 보여주지 말아야할것들이 나옴 
// --------------
// 예외처리
// try {
//     //처리하고자 하는 로직
//     5 / 0;
// } catch(Throwable $th) {  //7버전 이후는 throwable, 이전은 exceoption 을 사용하면됨
//     //예외 발생시 할 처리
//     echo $th->getMessage()."\n";
// } finally {
//     //예외의 발생 여부와 상관없이 항상 실행할 처리
//     echo "finally\n";
// }

// echo "처리끝";

// try {

//     echo "바깥쪽 try \n";

//     try {
//         5 / 0;
//         echo "안쪽 try \n";
//     }catch(Throwable$th) {
//         echo "안쪽 catch \n";
//         5 / 0;
//     }
// } catch(Throwable $th) {

//     echo "바깥쪽 catch \n";
// }

// 강제예외발생
// try {
//     throw new Exception("강제 예외 발생");
     
// } catch (Throwable $th) {
//     echo $th->getMessage();
// }

// -------------
$num =1;
var_dump((string)$num);

