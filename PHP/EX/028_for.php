<?php

// for 문 : 특정 처리를 반복적으로 구현하고자 할 때 사용

// // 0~5까지 숫자 출력
// echo "0"."\n";
// echo "1"."\n";
// echo "2"."\n";
// echo "3"."\n";
// echo "4"."\n";
// echo "5"."\n";

// // 기본형태
// for($i = 0; $i < 6; $i++) {
//     // 우리가 반복하고싶은 처리
//     echo"숫자 : " .$i. "\n";
// }

// // break : 처리중에 마주치면 loop을 종료

// for($i = 1; $i < 6; $i++) {
//     if ($i === 3) {
//         break ;
//     }
//     echo"숫자 : " .$i. "\n";
// }

for($i = 1; $i < 6; $i++) {
    echo"숫자 : " .$i. "\n";
    if ($i === 3) {
        break ;
    }
}

// // continue : 처리중에 컨티뉴를 만나면 이후의 처리를 건너뛰고 다음루프 실행
// for($i =1; $i <6; $i++) {
//     if (($i%2) === 0) { 
//         continue;
//     }
//     echo"숫자 : " .$i. "\n";
// }

// for($i =1; $i <6; $i++) {
//     echo"숫자 : " .$i. "\n";
//     if (($i%2) === 0) { 
//         continue;
//     }
// }

// // 구구단 2단 출력

// for ($gugu =1 ; $gugu <10 ; $gugu++ ) {
//     echo "2 X ".$gugu." = ".($gugu*2)."\n" ;
//     continue;
// }

// $dan =4;
// for ($gugu =1 ; $gugu <10 ; $gugu++ ) {
//     echo $dan." X ".$gugu." = ".($gugu*$dan)."\n" ;
//     continue;
// }

// 다중루프문
// for($i=1; $i < 3; $i++) {
//     echo "바깥LOOP 문 : ".$i."\n";

//     for($z =1;$z <3;$z++) {
//         echo "안쪽 LOOP문 : z값".$z.",i값 =".$i."\n";
//     }
// }

// for($dan=2 ; $dan<=9 ; $dan++) {
//     echo "**".$dan."단 **\n";

//     for($multi =1 ; $multi <=9; $multi++){
//         echo $dan." X ".$multi." =".($dan * $multi)."\n";
//     }    
// }


// // 아래처럼 별을 찍어주세요.
// // *****
// // *****
// // *****
// // *****
// // *****

// for($star=1;$star<6 ; $star++)  {
//     echo "*****\n";
//     }

// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****

// for($byul=1;$byul<=5 ; $byul++)  {
//     for($z =1; $z<= $byul ; $z++){
//         echo "*";    
//     }
//     echo"\n";
// }


// // 구구단 6단
// for ($gu =1 ; $gu <10 ; $gu++) {
//     echo "6 X ".$gu." = ".($gu*6)."\n";
// }