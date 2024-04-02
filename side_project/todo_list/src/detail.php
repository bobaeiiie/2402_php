<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/bobae/config1.php");												
require_once(FILE_LIB_DB);
$list_cnt = 5;
$page_num = 1;

try {

    $conn = my_db_conn();

    $no = isset($_GET["content_no"]) ? $_GET["content_no"] : "";
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
    exit;

} finally {
    if(!empty($conn)) {
        $conn = null;
    }
}


?>

<!-- _______________________________________________________ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/todo_list.css">
    <title>상세 페이지</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>
    
</head>
<body>
    <header>
        <div><h1><a href="./main.php">TO-DO LIST</a></h1></div>
        <div class="search">
            <form action="./main.php" method="post">
                <input class ="insert-input" type="text" name="content" id="content" placeholder="   Todo를 추가하세요.">
                <button class="plus-btn" type="submit"><i class="fa-solid fa-plus fa-beat"></i></button>
                <!-- <input type="search" name="search" id="search" class="search-place" placeholder="   Todo를 추가하세요."> -->

            </form>
        </div>
        <div class="main-etc">
            <button class="etc-btn"><i class="fa-solid fa-right-to-bracket"></i></button>
            <button class="etc-btn"><i class="fa-solid fa-bell"></i></button>
            <button class="etc-btn"><i class="fa-solid fa-user"></i></button>
            </form>
        </div>
    </header>
    <main>
        <div class="main-nav">
            <div class="nav-item-1">
            </div>
            <a href="./todo_list.php"><div class="nav-item page-link">To-do List</div></a>
            <a href="./quick-memo.php"><div class="nav-item  page-link">Quick Memo</div></a>
            <a href="./my-page.php"><div class="nav-item  page-link">My Page</div></a>
        </div>
        <div class="main-container-detail">
            <div class="todo-container-detail-profile">
                <div class="profile-place-detail">
                    <i class="fa-solid fa-user fa-user-detail"></i>
                </div>
                <div class="name-place">
                    <span class="name">김00</span>
                </div>
                <div></div>  
            </div>
            <div class="todo-container-detail-list">
            <?php
                foreach($result as $item) {
                ?>
                <form action="./com.php" method="post">
                    <div class="todo-pad-list">
                        <div class="chkbox-place">
                            <input type="hidden" name="content_no" value="<?php echo $item["content_no"] ?>">
                            <input type="hidden" name="page" value="<?php echo $page_num ?>">
                            <label for="chk-com<?php echo $item["content_no"] ?>" class="chkbox <?php echo empty($item["checked_at"]) ? "" : "chkbox-checked" ?>"></label>
                            <button type="submit" class="btn-com" id="chk-com<?php echo $item["content_no"] ?>"></button>
                        </div>
                        <label for="chkbox"><div class="content-title"><?php echo $item["content"] ?></div></label>
                        <div class="created-at"><?php echo $item["created_at"] ?></div>
                        <a href="./update.php?content_no=<?php echo $item["content_no"] ?>&page=<?php echo $page_num ?>" class="detail-link">
                            <div><i class="fa-solid fa-pencil"></i></div>
                        </a>
                        <a href="./delete.php?content_no=<?php echo $item["content_no"] ?>&page=<?php echo $page_num ?>" class="detail-link">
                            <div><i class="fa-solid fa-trash-can"></i></div>
                        </a>
                    </div>
                </form>
                <?php 
                }
                ?>

                <div class="pagenation">
                    <a href="./detail.php?page=<?php echo $prev_page_num ?>" class="page-move">이전</a>
                    <?php 
                    for($num = 1; $num <= $max_page_num; $num++) {
                    ?>
                    <a href="./detail.php?page=<?php echo $num ?>" class="page-num"><?php echo $num ?></a>
                    <?php 
                    }
                    ?>
                    <a href="./detail.php?page=<?php echo $next_page_num ?>" class="page-move">다음</a>
                </div>
            </div>
        </div>



    </main>
    <footer>
    </footer>
</body>
</html>