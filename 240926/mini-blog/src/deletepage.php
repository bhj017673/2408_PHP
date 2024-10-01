<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/default.php");
require_once(MY_PATH_DB_BLOG);

$conn=null;

try {
    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {

        $id = isset($_GET["id"]) ? (int)$_GET["id"] :0;
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

        if($id <1) {
            throw new Exception("Param Error");
        }
        $conn = my_db_conn();

        $arr_prepare = [
            "id" =>$id
        ];

        $result = my_board_id_selection($conn, $arr_prepare);

    }else {
        $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0 ;

        if($id <1 ) {
            throw new exception("Param Error");
        }
        $conn=my_db_conn();

        $conn->beginTransaction();

        $arr_prepare = [
            "id" => $id
        ];

        my_board_delete($conn, $arr_prepare);

        $conn->commit();

        header("Location: /diary.php");
        exit;
    }
}catch(Throwable $th) {
    if(!is_null($conn) && $conn->inTransaction()) {
        $conn->rollback();
    }
    require_once(MY_PATH_ERROR);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>
    <link rel="stylesheet" href="./css/delete.css">
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
                <div class="main-caution">
                    <p>삭제된 글은 복원할 수 없습니다. </p>
                    <p>글을 삭제 하시겠습니까?</p>
                 </div>  
                <div class="box">
                    <div class="box-title">게시글 번호</div>
                    <div class="box-content"><?php echo $result["id"]?></div>
                </div>
                <div class="box">
                    <div class="box-title">작성자</div>
                    <div class="box-content"><?php echo $result["NAME"]?></div>
                </div>
                <div class="box">
                    <div class="box-title">작성일자</div>
                    <div class="box-content"><?php echo $result["created_at"]?></div>
                </div>
                <div class="box">
                    <div class="box-title">제목</div>
                    <div class="box-content"><?php echo $result["title"]?></div>
                </div>
                <div class="last-box">
                    <div class="box-title">내용</div>
                    <div class="box-content"><?php echo $result["content"]?></div>
                </div>
                
            </div>
                <div class="main-footer">
                <form action="/deletepage.php" method="post">
                <input type="hidden" name="id" value="<?php echo $result ["id"]?>">
                <button type="submit" class="btn-small">Delete</button>
                <a href="/detailpage.php?id=<?php echo $result ["id"] ?> &page=<?php echo $page ?>"><button type="button" class ="btn-small">Cancel</button></a>
            </form>
           
    </main>
</body>
</html>