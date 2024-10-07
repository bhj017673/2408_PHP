<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/default.php");

function my_db_conn() {
    $option =[
        PDO::ATTR_EMULATE_PREPARES      =>false
        ,PDO::ATTR_ERRMODE              =>PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   =>PDO::FETCH_ASSOC
    ];

    return new PDO(MY_MARIADB_DSN, MY_MARIADB_USER, MY_MARIADB_PASSWORD, $option);

}

function my_board_select_pagination(PDO $conn, array $arr_param) {
    $sql =
    " SELECT "
    ."      * "
    ." FROM "
    ."      board"
    ." WHERE "
    ."      deleted_at IS NULL "
    ." ORDER BY "
    ."      created_at DESC "
    ."      , id DESC "
    ." LIMIT :list_cnt OFFSET :offset "
    ;

    $stmt=$conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception(" Query Error");
    }

    return $stmt->fetchAll();
}

function my_board_total(PDO $conn) {
    $sql =
        " SELECT "
        ."      COUNT(*) cnt "
        ." FROM "
        ."      board "
        ." WHERE "
        ."      deleted_at IS NULL "
    ;

    $stmt = $conn->query($sql);
    $result = $stmt->fetch();

    return $result["cnt"];
}

function my_board_insert(PDO $conn, $arr_param) {
    $sql = 
    " INSERT INTO board ( "
    ."      title "
    ."      ,content "
    ."      ,name "
    ." ) "
    ." VALUES ( "
    ."      :title "
    ."      ,:content "
    ."      ,:name "
    ." ) "
    ;
    
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new exception("Query Error");
    }

    $result_flg = $stmt->rowCount();

    if($result_flg !== 1) {
        throw new Exception(" Insert Count Error");
    }

    return true;
}

function my_board_id_selection(PDO $conn, array $arr_param) {
    $sql = 
    " SELECT "
    ."      * "
    ." FROM "
    ."      board "
    ." WHERE "
    ."      id = :id "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg=$stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("Query Error");
    }

    return $stmt->fetch();

}

function my_board_update(PDO $conn, array $arr_param) {
    $sql =
        " UPDATE board "
        ." SET "
        ."      title = :title "
        ."      ,content = :content "
        ."      ,updated_at = NOW() "
        ." WHERE "
        ."      id=:id "
        ;

        $stmt = $conn->prepare($sql);
        $result_flg = $stmt->execute($arr_param);

        if(!$result_flg) {
            throw new Exception("Query Error");
        }

        if($stmt->rowCount() !== 1 ) {
            throw new Exception (" Update Count Error");
        }

        return true;
}

function my_board_delete(PDO $conn, $arr_param) {
    $sql = 
        " UPDATE board "
        ." SET "
        ."      updated_at = NOW() "
        ."      ,deleted_at = NOW() "
        ." WHERE "
        ."      id=:id "
    ;

    $stmt=$conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("Query Error");
    }
    if($stmt->rowCount() !==1) {
        throw new Exception("Delete Count Error");
    }
    return true;
}