<?php

require_once("./my_db.php");

try {
    $conn = my_db_conn();
    $id =1;
    $sql = " SELEC"
            ."*"
            ."From employees"
            ."WHERE"
            ."      emp_id = :emp_id"
            ." ANd name = :name";

$arr_prepare = [
    "emp_id" => $id
    ,"name"=> "홍길동"
];

$stmt = $conn ->prepare($sql); //db 질의 준비
$stmt -> execute($ar_preopeare); //질의 실행
$result = $stmt->fetchall(); ///질의 결과패치
} catch(throwable $th) {
    echo $th ->getMessage(); //예외메세지 출력
}
