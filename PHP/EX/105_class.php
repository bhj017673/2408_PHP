<?php
require_once("./Whale.php");

// // 인스턴스화
// $whale = new Whale();

// // class의 메소드 사용
// $whale->breath();

// echo $whale->name; //public이므로 접근 가능
// // echo $whale->age; // private이므로 접근 불가
// echo $whale->info();

require_once("./Shark.php");
// 스태틱 멤버에 접근
Whale :: myStatic();

// 상어 클래스
$shark = new Shark("상어");
echo $shark->name;