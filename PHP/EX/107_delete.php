<?php

require_once ("./my_db.php");

$conn = null;

try {
    //PDO 획득
    $conn = my_db_conn();
    
    //트랜잭션 시작
    $conn->beginTransaction();

    //sql
    $sql = 
        "DELETE FROM employees "
        ." WHERE "
        ."      emp_id = :emp_id "
    ;    
    $arr_prepare = [
        "emp_id" =>100001
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt = $stmt->rowCount();

    if(!$result_flg) {
        throw new Exception("실행 실패");
    }

    if($result_cnt>1) {
        throw new Exception("삭제 수 이상");
    }

    $conn->commit();
    
} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollBack();
    }

    echo $th->getMessage();
}

