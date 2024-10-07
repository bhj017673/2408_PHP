<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/default.php");
require_once(MY_PATH_DB_BLOG);

$conn=null;

try {
    $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0 ;

    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1 ;

    if($id <1 ) {
        throw new Exception("Param Error");
    }

    $conn= my_db_conn();

    $arr_prepare = [
        "id" => $id
    ];

    $result = my_board_id_selection($conn, $arr_prepare);
}catch(Throwable $th) {
    require_once(MY_PATH_ERROR);
    exit;
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detail.css">
    <title>Detail Page</title>
</head>
<body>
    <main>
        <div class="container">
            <h1 class=" main-title">Diary</h1>
            <div class="main-menu">
                <div><a href="/index.php">Home</a></div>
                <div><a href="/list.php">List</a></div>
                <div><a href="/diary.php">Diary</a></div>
                <div><a href="/calendar.php">Calendar</a></div>
                <div><a href="/portfolio.php">Portfolio</a></div>
            </div>
            <div class="main-content">
                <div class="box">
                    <div class="box-title">게시글 번호</div>
                    <div class="box-content"><?php echo $result["id"] ?></div>
                </div>
                <div class="box">
                    <div class="box-title">작성일자</div>
                    <div class="box-content"><?php echo $result["created_at"] ?></div>
                </div>
                <div class="box">
                    <div class="box-title">작성자</div>
                    <div class="box-content"><?php echo $result["NAME"] ?></div>
                </div>
                <div class="box">
                    <div class="box-title">제목</div>
                    <div class="box-content"><?php echo $result["title"] ?></div>
                </div>
                <div class="box">
                    <div class="box-title">내용</div>
                    <div class="box-content"><?php echo $result["content"] ?></div>
                </div>
            </div>
            <div class="main-footer">
                <a href="/update.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button type="button" class="btn-small">Edit</button></a>
                <a href="/diary.php?page=<?php echo $page?>"><button type="button" class ="btn-small">Cancel</button></a>
                <a href="/deletepage.php?id=<?php echo $result["id"]?>&page=<?php echo $page ?>"><button type="button" class ="btn-small">Delete</button></a>
            </div>
    </main>
</body>
</html>