<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/default.php");
require_once(MY_PATH_DB_BLOG);

$conn=null;

try {
    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET" ) {
        
        $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0 ;

        $page = isset($_SERVER["id"]) ? (int)$_GET["page"] :1 ;

        if($id <1) {
            throw new Exception("Param Error");
        }

        $conn = my_db_conn();

        $arr_prepare = [
            "id" => $id
        ];

        $result = my_board_id_selection($conn, $arr_prepare);
    
    } else {
        $id = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

        $page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;

        $title = isset($_POST["title"]) ? $_POST["title"] : "";

        $content = isset($_POST["content"]) ? $_POST["content"] : "";


        if($id < 1 || $title === "") {
            throw new Exception("Param Error");
        }

        $conn=my_db_conn();

        $conn->beginTransaction();

        $arr_prepare = [
            "id" =>$id
            ,"title" => $title
            ,"content" => $content
        ];

        my_board_update($conn, $arr_prepare);

        $conn->commit();

        header("Location: /detailpage.php?id=".$id."&page=".$page);
        exit;
    }

}catch(Throwable $th) {
    if(!is_null($conn) && $conn->inTransaction()) {
        $conn->rollBack();
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
    <title>Document</title>
    <link rel="stylesheet" href="./css/update.css">
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
                <form action="/update.php" method="post">
                    <input type="hidden" name="page" value= "<?php echo $page ?>">
                    <input type="hidden" name="id" value="<?php echo $result["id"]?>">

                    <div class="title">
                        <div class="box-title">글번호
                            <div id="name" ><?php echo $result["id"] ?></div>
                    </div>
                    <div class="title">
                        <div class="box-title">작성자
                            <div id="name" ><?php echo $result["NAME"] ?></div>
                    </div>
                    <div class="title">
                        <div class="box-title">제목
                            <input type="text" name="title" id="title" value="<?php echo $result["title"] ?>">
                        </div>
                    </div>
                    <div class="content">
                        <div class="box-content">내용
                            <textarea name="content" id="content"><?php echo $result ["content"]?></textarea>
                        </div>
                    </div>
                    <div class="main-footer">
                            <button type="submit" class="btn-small">Complete</button>
                        <a href="/diary.php?id=<?php echo $result["id"] ?>&page=<?php echo $page?>"><button type="button" class ="btn-small cancel">Cancel</button></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>