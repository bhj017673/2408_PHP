<?php

// 나의 급여를 2500만원으로 변경해주세요.


// 수정날짜 업데이트

require_once ("../EX/my_db.php");

$conn = null;

// try {
//     $conn =my_db_conn();

//     $sql =
//         " UPDATE salaries "
//         ." SET "
//         ."      end_at = NOW() "
//         ." WHERE "
//         ."      emp_id =:emp_id"
//     ;
//     $arr_prepare = [
//         "emp_id" => 100009
//     ];

//     $conn->beginTransaction();

//     $stmt =$conn->prepare($sql);
//     $result_flg = $stmt->execute($arr_prepare);
//     $result_cnt = $stmt->rowCount();

//     if(!$result_flg) {
//         throw new Exception ("Update Query Error : Salaries");
//     }

//     if($result_cnt !==1) {
//         throw new Exception(" Update Count Error : Salaries");
//     }

//     $sql =
//         " INSERT INTO salaries( "
//         ."      emp_id "
//         ."      ,salary "
//         ."      ,start_at "
//         ." ) "
//         ." VALUES( "
//         ."      :emp_id "
//         ."      ,:salary "
//         ."      ,DATE(NOW()) "
//         ." ) "
//     ;

//     $arr_prepare = [
//         "emp_id" => 100009
//         ,"salary" => 25000000
//     ];

//     $stmt = $conn->prepare($sql);
//     $result_flg = $stmt->execute($arr_prepare);
//     $result_cnt = $stmt->rowCount();

//     if(!$result_flg) {
//         throw new Exception(" Insert Query Error : Salaries");
//     }

//     if($result_cnt !==1) {
//         throw new Exception("Insert Count Error : Salaries");
//     }

//     $conn->commit();

// } catch(Throwable $th) {
//     if(!is_null($conn)) {
//         $conn->rollBack();
//     }
//     echo $th ->getMessage();
// }

try {
    $conn = my_db_conn();

    $conn->beginTransaction();

    $conn->commit();

    $sql = 
        " UPDATE salaries "
        ." SET "
        ."      end_at = DATE(NOW()) "
        ."      ,updated_at = NOW() "
        ." WHERE "
        ."      emp_id = :emp_id "
        ." AND end_at IS NULL "
    ;

    $arr_prepare = [
        "emp_id" => 100009
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);

    if(!$result_flg) {
        throw new Exception(" Update Exec Error : Salaries ");
    }

    if($stmt->rowCount() !==1) {
        throw new Exception(" Update Row Count Error : Salaries ");
    }

    // 급여이력 추가
    $sql = 
        " INSERT INTO salaries( "
        ."      emp_id "
        ."      ,salary "
        ."      ,start_at "
        ." ) "
        ." VALUES( "
        ."      :emp_id "
        ."      ,:salary "
        ."      ,DATE(NOW()) "
        ." ) "
    ;

    $arr_prepare = [
        "emp_id" => 100009
        ,"salary"=> 25000000
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);

    if(!$result_flg) {
        throw new Exception(" Update Exec Error : Salaries ");
    }

    if($stmt->rowCount() !==1) {
        throw new Exception(" Update Row Count Error : Salaries ");
    }


}catch(Throwable $th) {
    if(!is_null($conn)) {
         $conn->rollBack();
    }
     echo $th ->getMessage();
}
