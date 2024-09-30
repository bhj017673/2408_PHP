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
    ."      ,NAME "
    ." ) "
    ." VALUES ( "
    ."      :title "
    ."      :content "
    ."      :NAME "
    ." ) "
    ;
    
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new exception("Query Error");
    }

    $result_cnt = $stmt->rowCount();

    if($result_flg !== 1) {
        throw new Exception(" Insert Count Error");
    }

    return true;
}