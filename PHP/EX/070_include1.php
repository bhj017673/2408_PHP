<?php
// 다른파일의 소스코드를 사용하기위해 불러오는 방법

// include > 해당파일을 불러오며, 중복작성할 경우 여러번 불러온다
// include_once > 해당파일을 불러오며, 중복작성하여도 딱 한번만 불러온다.
// 오류 발생시 프로그램을 정지하지않고 처리진행.

// include("./070_include2.php");
// echo "include 1111\n";

// // include_once();

// require > 해당파일을 불러오며, 중복작성할 경우 여러번 불러온다
// requrire_once > 해당파일을 불러오며, 중복작성하여도 딱 한번만 불러온다.
// 오류발생시 프로그램을 정지

require ("./070_include2.php");
echo "include 1111\n";