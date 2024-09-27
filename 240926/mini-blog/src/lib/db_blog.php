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

function my_board_total(PDO $conn) {
    $sql =
        " SELECT "
        ."      COUNT(*) cnt "
        ." FROM "
        ."      board "
        ." WHERE "
        ."      deleted_at is null "
    ;

    $stmt = $conn->query($sql);
    $result =$stmt->fetchAll();

    return $result["cnt"];
}