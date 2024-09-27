<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/default.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {
    $conn =  my_db_conn();

    $max_board_cnt = my_board_total($conn);


    $page = isset($_GET["page"]) ? (int)$_GET["page"] :1 ;
    $offset = ($page -1) * MY_LIST_COUNT;
    $start_page_button = (int)(floor(($page-1)/ MY_PAGE_BUTTON_COUNT)*MY_PAGE_BUTTON_COUNT) +1 ;
    $end_page_button = $start_page_button +(MY_PAGE_BUTTON_COUNT - 1);

    $end_page_button = $end_page_button > $max_page ? $max_page : $end_page_button;
    $prev_page_button = $page -1 <1 ? 1:$page -1 ;
    $next_page_button = $page +1 > $max_page ? $max_page : $page+1;
    
    $arr_prepare= [
        "list_cnt" => MY_LIST_COUNT
    ]

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
                <div><a href="./mainpage.html">Home</a></div>
                <div><a href="./list.html">List</a></div>
                <div><a href="./diary.html">Diary</a></div>
                <div><a href="./calendar.html">Calendar</a></div>
                <div><a href="portfolio.html">Portfolio</a></div>
            </div>
            <div class="main-top">
                <a href="./insert.html">
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
                <div class="list-content">
                    <div>30</div>
                    <div><a href="./detail.html">게시글 제목 30</a></div>
                    <div>2024-01-01 10:53:20</div>
                    <div>배짜장</div>
                </div>
                <div class="list-content">
                    <div>30</div>
                    <div><a href="./detail.html">게시글 제목 30</a></div>
                    <div>2024-01-01 10:53:20</div>
                    <div>김레이</div>
                </div>
                <div class="list-content">
                    <div>30</div>
                    <div><a href="./detail.html">게시글 제목 30</a></div>
                    <div>2024-01-01 10:53:20</div>
                    <div>이봉봉</div>
                </div>
                <div class="list-content">  
                    <div>30</div>
                    <div><a href="./detail.html">게시글 제목 30</a></div>
                    <div>2024-01-01 10:53:20</div>
                    <div>배현진</div>
                </div>
                <div class="list-content">
                    <div>30</div>
                    <div><a href="./detail.html">게시글 제목 30</a></div>
                    <div>2024-01-01 10:53:20</div>
                    <div>강호두</div>
                </div>
                <div class="main-footer">
                    <a href="./insert.html"><button class="btn-small">이전</button></a>
                    <a href="./insert.html"><button class="btn-small">1</button></a>
                    <a href="./insert.html"><button class="btn-small">2</button></a>
                    <a href="./insert.html"><button class="btn-small">3</button></a>
                    <a href="./insert.html"><button class="btn-small">4</button></a>
                    <a href="./insert.html"><button class="btn-small">5</button></a>
                    <a href="./insert.html"><button class="btn-small">다음</button></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>