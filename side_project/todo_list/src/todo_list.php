<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/bobae/config1.php"); // 서버루트												
require_once(FILE_LIB_DB); // DB관련 라이브러리


try {

    $conn = my_db_conn();

    $page_num= isset($_GET["page"]) ? $_GET["page"] : $page_num;

    $result_board_cnt = db_select_boards_cnt($conn);

    $max_page_num = ceil($result_board_cnt / $list_cnt);
    $offset = $list_cnt * ($page_num - 1);
    $prev_page_num = ($page_num - 1) < 1 ? 1 : ($page_num - 1);
    $next_page_num = ($page_num + 1) > $max_page_num ? $max_page_num : ($page_num + 1);

    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset
    ];

    $result = db_select_boards_paging($conn, $arr_param);


} catch(\Throwable $e) {
    echo $e->getMessage();
    // exit;

} finally {
    if(!empty($conn)) {
        $conn = null;
    }
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/todo_list.css">
    <title>투두 페이지</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>
</head>
<body>
    <header>
        <div class="header-logo"><h1><a href="./main.php">TO-DO LIST</a></h1></div>
        <div class="search">
            <form action="" method="post">
                <input type="search" name="search" id="search" class="search-place" placeholder="검색어를 입력하세요.">
                <button class="plus-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="main-etc">
            <button class="etc-btn"><i class="fa-solid fa-right-to-bracket"></i></button>
            <button class="etc-btn"><i class="fa-solid fa-bell"></i></button>
            <button class="etc-btn"><i class="fa-solid fa-user"></i></button>
        </div>
    </header>
    <main>
        <div class="main-nav">
            <div class="nav-item-1">
            </div>
            <a href="./todo_list.php"><div class="nav-item nav-item-select page-link">To-do List</div></a>
            <a href="./quick-memo.php"><div class="nav-item  page-link">Quick Memo</div></a>
            <a href="./my-page.php"><div class="nav-item  page-link">My Page</div></a>
        </div>
        <div class="main-container">
            <div class="todo-container">
                <a href="./detail.php" class="detail-link">
                    <div class="todo-pad">
                        <div class="profile-place">
                            <i class="fa-solid fa-user fa-user-1"></i>
                        </div>
                        <div class="name-place">
                            <span class="name">김00</span>
                        </div>
                        <div class="title-place">
                            <div><i class="fa-solid fa-quote-left"></i></div>
                            <span class="goal">야구장 직관 가기</span>
                            <div><i class="fa-solid fa-quote-right"></i></div>
                        </div>
                        <span class="complete">checked</span>
                    </div>
                </a>
                <a href="./detail.php" class="detail-link">
                    <div class="todo-pad">
                        <div class="profile-place">
                            <i class="fa-solid fa-user fa-user-1"></i>
                        </div>
                        <div class="name-place">
                            <span class="name">김00</span>
                        </div>
                        <div class="title-place">
                            <div><i class="fa-solid fa-quote-left"></i></div>
                            <span class="goal">야구장 직관 가기</span>
                            <div><i class="fa-solid fa-quote-right"></i></div>
                        </div>
                        <span class="complete">checked</span>
                    </div>
                </a>
                <a href="./detail.php" class="detail-link">
                    <div class="todo-pad">
                        <div class="profile-place">
                            <i class="fa-solid fa-user fa-user-1"></i>
                        </div>
                        <div class="name-place">
                            <span class="name">김00</span>
                        </div>
                        <div class="title-place">
                            <div><i class="fa-solid fa-quote-left"></i></div>
                            <span class="goal">야구장 직관 가기</span>
                            <div><i class="fa-solid fa-quote-right"></i></div>
                        </div>
                        <span class="complete">checked</span>
                    </div>
                </a>
                <a href="./detail.php" class="detail-link">
                    <div class="todo-pad">
                        <div class="profile-place">
                            <i class="fa-solid fa-user fa-user-1"></i>
                        </div>
                        <div class="name-place">
                            <span class="name">김00</span>
                        </div>
                        <div class="title-place">
                            <div><i class="fa-solid fa-quote-left"></i></div>
                            <span class="goal">야구장 직관 가기</span>
                            <div><i class="fa-solid fa-quote-right"></i></div>
                        </div>
                        <span class="complete">checked</span>
                    </div>
                </a>
            </div>
        </div>

    </main>
    <footer>
    </footer>
</body>
</html>