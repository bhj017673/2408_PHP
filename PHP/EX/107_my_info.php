<?php

require_once ("./my_db.php");

$conn = null;

try {
    $conn = my_db_conn();


        $conn->beginTransaction();

        $sql =
            " INSERT INTO employees( " 
            ." name "
            ." ,birth "
            ." ,gender "
            ." ,hire_at "
            ." ) "
            ." VALUES( "
            ." :name "
            ." ,:birth "
            ." ,:gender "
            ." ,DATE(NOW()) "
            ." ) "
        ;
        $arr_prepare = [
            "name" => "배현진"
            ,"birth" =>"2001-01-01"
            ,"gender" => "F"
        ];

        $stmt = $conn ->prepare($sql);
        $result_flg = $stmt->execute($arr_prepare);
        $result_cnt = $stmt->rowCount();

        if(!$result_flg) {
            throw new Exception("Insert Query Error : employees");
        }

        if($result_cnt !== 1) {
            throw new Exception("Insert Count Error : employees");
        }

        // insert 한 pk획득
        $emp_id = $conn->lastInsertId();
        // echo $emp_id;
    // --------
    // 급여 테이블

    $sql =
        " INSERT INTO salaries( "
        ."      emp_id "
        ."      ,salary "
        ."      ,start_at "
        ." ) "
        ." VALUES( "
        ."      :emp_id"
        ."      ,:salary "
        ."      ,DATE(NOW()) "
        ." ) "
    ;
    $arr_prepare = [
        "emp_id" =>$emp_id
        ,"salary" => 2600000000
    ];

    $stmt =$conn->prepare($sql); //쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); //쿼리 실행
    $result_cnt = $stmt->rowCount(); //영향받은 레코드 수 획득

    //쿼리 실행 예외 처리
    if (!$result_flg) {
        throw new Exception("Insert Query Error : salaries");
    }

    //영향받은 레코드 수 예외 처리
    if ($result_cnt !== 1 ) {
        throw new Exception("Insert Count Error : salaries");
    }

    // ---------------------
    // 직급 테이블 insert
    $sql =
    " INSERT INTO title_emps( "
    ."      emp_id "
    ."      ,title_code "
    ."      ,start_at "
    ." ) "
    ." VALUES( "
    ."      :emp_id"
    ."      ,:title_code "
    ."      ,DATE(NOW()) "
    ." ) "
;
$arr_prepare = [
    "emp_id" =>$emp_id
    ,"title_code" => "T001"
];

$stmt =$conn->prepare($sql); //쿼리 준비
$result_flg = $stmt->execute($arr_prepare); //쿼리 실행
$result_cnt = $stmt->rowCount(); //영향받은 레코드 수 획득

//쿼리 실행 예외 처리
if (!$result_flg) {
    throw new Exception("Insert Query Error : title_emps");
}

//영향받은 레코드 수 예외 처리
if ($result_cnt !== 1 ) {
    throw new Exception("Insert Count Error : title_emps");
}


    // -----------------
    // 부서테이블 insert
    $sql =
    " INSERT INTO department_emps( "
    ."      emp_id "
    ."      ,dept_code "
    ."      ,start_at "
    ." ) "
    ." VALUES( "
    ."      :emp_id"
    ."      ,:dept_code "
    ."      ,DATE(NOW()) "
    ." ) "
;
$arr_prepare = [
    "emp_id" =>$emp_id
    ,"dept_code" => "D008"
];

$stmt =$conn->prepare($sql); //쿼리 준비
$result_flg = $stmt->execute($arr_prepare); //쿼리 실행
$result_cnt = $stmt->rowCount(); //영향받은 레코드 수 획득

//쿼리 실행 예외 처리
if (!$result_flg) {
    throw new Exception("Insert Query Error : department_emps");
}

//영향받은 레코드 수 예외 처리
if ($result_cnt !== 1 ) {
    throw new Exception("Insert Count Error : department_emps");
}




    //commit
    $conn->commit();
} catch(Throwable $th) {
    if (!is_null($conn)) {
        $conn->rollBack();
    }
    echo $th->getMessage();
}