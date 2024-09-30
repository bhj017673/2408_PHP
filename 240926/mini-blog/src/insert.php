<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/default.php");
require_once(MY_PATH_DB_BLOG);

$conn=null;

if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
    try{

        $conn = my_db_conn();

        $arr_prepare = [
            "title" =>$_POST["title"]
            ,"content" => $_POST["content"]
            ,"writer" => $_POST["writer"]
        ];

        $conn->beginTransaction();
        
        my_board_insert($conn, $arr_prepare);

        $conn->commit();
        header("Location: /" );
        exit;
    }   catch(Throwable $th) {
        if(!is_null($conn)) {
            $conn->rollBack();
        }
        require_once(MY_PATH_ERROR);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/insert.css">
</head>
<body>
    <main>
        <div class="container">
            <h1 class=" main-title">Diary</h1>
            <div class="main-menu">
                <div><a href="./mainpage.html">Home</a></div>
                <div><a href="./list.html">List</a></div>
                <div><a href="./diary.html">Diary</a></div>
                <div><a href="./calendar.html">Calendar</a></div>
                <div><a href="./portfolio.html">Portfolio</a></div>
            </div>
            <div class="main-content">
                <form action="./insert.php" method="post">
                    <div class="writer">
                        <div class="box-writer">작성자
                            <input type="text" name="writer" id="writer" maxlength="20">
                        </div>
                    </div>
                    <div class="title">
                        <div class="box-title">제목
                            <input type="text" name="title" id="title">
                        </div>
                    </div>
                    <div class="content">
                        <div class="box-content">내용
                            <textarea name="content" id="content"></textarea>
                        </div>
                    </div>
                    <div class="main-footer">
                            <button type="submit" class="btn-small">POST</button>
                        <a href="./"><button type="button" class ="btn-small cancel">CANCEL</button></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>