<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/list.css">
    <script src="/list.js" type="text/javascript"></script>
    <title>Document</title>
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
    <header>
      <h1>To Do List</h1>
      <div class="input-wrapper">
        <input type="text" id="input-box" placeholder="내용을 입력하세요" /
       >
        <input
          type="button"
          id="input-button"
          value="+"
          onclick="onClickInputButton(this)"
        />
      </div>
    </header>
    <main>
      <ul class="to-do-list">
        <li>
          <input
            type="checkbox"
            class="checkbox"
            onclick="onClickCheckbox(this)"
          />
          <span>first item</span>
          <img
            src="trashcan.png"
            width="25"
            height="25"
            alt="my image"
            onclick="onClickDeleteButton(this)"
          />
        </li>
        <li>
          <input
            type="checkbox"
            class="checkbox"
            onclick="onClickCheckbox(this)"
          />
          <span>second item</span>
          <img
            src="trashcan.png"
            width="25"
            height="25"
            alt="my image"
            onclick="onClickDeleteButton(this)"
          />
        </li>
      </ul>
    </main>
</body>
</main>
</html>