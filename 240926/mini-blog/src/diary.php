<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/default.php");
require_once(MY_PATH_DB_BLOG);

$conn=null;


try {
    //PDO 인스턴스
    $conn = my_db_conn();

    $max_board = my_board_total($conn);
    $max_page = (int)ceil($max_board / MY_LIST_COUNT);

    $page = isset($_GET["page"]) ? (int)$_GET["page"] :1 ;
    $offset = ($page - 1)  * MY_LIST_COUNT;
    $start_page_button = (int)(floor(($page-1)/ MY_PAGE_BUTTON_COUNT) * MY_PAGE_BUTTON_COUNT) +1;
    $end_page_button = $start_page_button + (MY_PAGE_BUTTON_COUNT -1 );

    $end_page_button = $end_page_button > $max_page ? $max_page : $end_page_button;
    $prev_page_button = $page - 1 < 1 ? 1 : $page -1; // 이전 버튼
    $next_page_button = $page + 1 > $max_page ? $max_page : $page +1;
   

    $arr_prepare =[
        "list_cnt" => MY_LIST_COUNT
        ,"offset"  => $offset
    ];

    $result = my_board_select_pagination($conn, $arr_prepare);

}catch(Throwable $th) {
    require_once(MY_PATH_ROOT."error.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/diary.css">
</head>
<body>
    <main>
        <div class="container">
            <h1 class=" main-title">Diary</h1>
            <div class="main-menu">
                <div><a href="./mainpage.php">Home</a></div>
                <div><a href="./list.php">List</a></div>
                <div><a href="./diary.php">Diary</a></div>
                <div><a href="./calendar.php">Calendar</a></div>
                <div><a href="portfolio.php">Portfolio</a></div>
            </div>
            <div class="main-top">
                <a href="./insert.php">
                    <button class="btn-middle">New Post</button>
                </a>
            </div>
            <div class="main-list">
                <div class="list-head">
                    <div>번호</div>
                    <div>제목</div>
                    <div>작성일자</div>
                    <div>작성자</div>
                </div>
                <?php foreach($result as $item) { ?>
                <div class="list-content">
                <div><?php echo $item["id"] ?></div>
                <div><a href="/detail.php?id=<?php echo $item["id"] ?>&page=<?php echo $page ?>"><?php echo $item["title"] ?></a></div>
                <div><?php echo $item["created_at"] ?></div>
                <div><?php echo $item["NAME"] ?></div>
                </div>
            <?php } ?>
                </div>
            <div class="main-footer">
                <?php if($page !== 1) {?> 
                <a href="/diary.php?<?php echo $prev_page_button ?>"><button class="btn-small">PREV</button></a>
                <?php } ?>
                <?php for($i = $start_page_button; $i <= $end_page_button; $i++) { ?>
                <a href="/diary.php?page=<?php echo $i ?>"><button class="btn-small <?php echo $page ===$i ? "btn-selected" : "" ?>"><?php echo $i ?></button></a>
                <?php } ?>
                <?php if($page !== $max_page) { ?>
                <a href="/diary.php?page=<?php echo $next_page_button ?>"><button class="btn-small">NEXT</button></a>
                <?php } ?>
            </div>
            </div>
        </div>
    </main>
</body>
</html>