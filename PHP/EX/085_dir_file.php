<?php

// //  디렉토리 생성
// $mkdir_result = mkdir("./my-dir");
// if($mkdir_result) {
//     echo "있다\n";
// }else {
//     echo "없다\n";
// }

// // is_dir() :디렉토리 존재 유무체크
// $chk_result = is_dir("./my-dir");
// if($chk_result) {
//     echo "있다\n";
// }else {
//     echo "없다\n";
// }

// // 디렉토리 열기 및 읽기
// $open_result = opendir("./my-dir"); //디렉토리 열기

//디렉토리 읽기
// while($file = readdir($open_result)) {
//     echo $file."\n";
// }

// // 디렉토리 닫기
// closedir($open_result);

// // 디렉토리 삭제
// rmdir("./my_dir");

// 파일 열기
$file = fopen("./my_dir/test.txt", "a");
if($file) {
    //파일열기 성공시 처리

    // 파일에 쓰기
    fwrite($file, "떡볶이");//파일에 쓰기

}else {
    //파일열기 실패시 처리
    echo "파일 열기 실패";
}

// 파일 닫기
fclose($ile);