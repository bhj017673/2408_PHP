<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null ;

try {

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
    <link rel="stylesheet" href="./css/delete.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>삭제페이지</title>
</head>
<body>
<?php
    require_once(MY_PATH_ROOT."header.php")
?>
<main>
    <div class="main-header">
        <p>삭제하면 영구적으로 복원할 수 없습니다. </p>
        <p>정말로 삭제 하시겠습니까?</p>
    </div>
    <div class="main-content">
        <div class="box">
            <div class="box-title">게시글 번호</div>
            <div class="box-content">30</div>
        </div>
        <div class="box">
            <div class="box-title">작성일</div>
            <div class="box-content">2024-01-01 10:00:00</div>
        </div>
        <div class="box">
            <div class="box-title">제목</div>
            <div class="box-content">제목 3022</div>
        </div>
        <div class="box">
            <div class="box-title">내용</div>
            <div class="box-content">내용3011</div>
        </div>

        <div class="main-footer">
            <a href="/index.php"><button type="button" class="btn-small">동의</button></a>
            <a href="/detail.php"><button type="button" class ="btn-small">취소</button></a>
        </div>
    </div>
</main>
</body>
</html>