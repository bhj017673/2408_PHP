<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/default.php");
require_once(MY_PATH_DB_BLOG);

$conn=null;

if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
    try{

        $conn = my_db_conn();

        $arr_prepare = [
            "title" => $_POST["title"]
            ,"content" => $_POST["content"]
            ,"name" => $_POST["name"]
        ];

        $conn->beginTransaction();
        my_board_insert($conn, $arr_prepare);

        $conn->commit();
        header("Location: /diary.php" );
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
    <link rel="stylesheet" href="./css/insert.css">
    <title>작성페이지</title>
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
                <form action="./insert.php" method="post">
                    <div class="writer">
                        <div class="box-writer">작성자
                            <input type="text" name="name" id="name" maxlength="20">
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
                        <a href="./diary.php"><button type="button" class ="btn-small cancel">CANCEL</button></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>