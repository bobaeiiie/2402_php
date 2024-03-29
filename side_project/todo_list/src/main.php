<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bobae/config1.php");												
require_once(FILE_LIB_DB);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/todo_list.css">
    <title>메인 페이지</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>
</head>
<body>
    <div class="container">
        <header>
            <div></div>
            <div></div>
            <div class="main-etc">
                <button class="etc-btn"><i class="fa-solid fa-right-to-bracket"></i></button>
                <button class="etc-btn"><i class="fa-solid fa-bell"></i></button>
                <button class="etc-btn"><i class="fa-solid fa-user"></i></button>
            </div>
        </header>
        <main>
            <div class="logo-container">
                <div class="logo">
                    <div><h1><a href="./main.html" class="logo-text">TO-DO LIST</a></h1></div>
                </div>
                <div class="search">
                    <form action="" method="post">
                        <input type="search" name="search" id="search" class="search-place" placeholder="검색어를 입력하세요.">
                        <button class="plus-btn"><i class="fa-solid fa-plus fa-beat"></i></button>
                    </form>
                </div>
            </div>
        </main>
        <main2>
            <div class="main-to-page-container">
                <a href="./todo_list.html"><div class="main-to-page">To-Do List</div></a>
                <a href=""><div class="main-to-page">Quick Memo</div></a>
                <a href=""><div class="main-to-page">My Page</div></a>
            </div>
        </main2>
        <footer>
        </footer>
    </div>

    


</body>
</html>



