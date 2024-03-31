<?php 

require_once($_SERVER["DOCUMENT_ROOT"]."/config.php"); 								
require_once(FILE_LIB_DB); 

// POST 처리
// GET 처리 필요 없음. 화면 표시만 함
if(REQUEST_METHOD === "POST") { // 
    try{
        // 파라미터 획득
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 획득
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 획득
        // title만 체크하고 멈추면 안되기 때문에 따로따로 체크해야 함.
        
        // 파라미터 에러 체크
        $arr_err_param = [];
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            // 예외 처리
            throw new Exception("Parameter Error : ".implode(", ",$arr_err_param));
        } 
        
        // DB Connect
        $conn = my_db_conn(); // PDO 인스턴스

        // Transaction 시작
        $conn->beginTransaction();

        // 게시글 작성 처리
        $arr_param = [
            "title" => $title
            ,"content" => $content
        ];
        $result = db_insert_boards($conn, $arr_param);

        // 글 작성 예외처리
        if($result !== 1) {
            throw new Exception("Insert Boards count"); // 혹시라도 모를 예외 상황을 대비하기 위해. 프로젝트 때에는 넣지 않아도 됨.
        }

        // 커밋
        $conn->commit();

        // 리스트 페이지로 이동
        header("Location: list.php");
        exit;

    } catch(\Throwable $e) {
        if(!empty($conn)) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;

    } finally {
        if(!empty($conn)) {
            $conn = null;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/todo_list.css">
    <title>작성 페이지</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>

</head>
<body>
    <header>
        <div><h1><a href="./main.html">TO-DO LIST</a></h1></div>
        <div></div>
        <div class="main-etc">
            <button class="etc-btn"><i class="fa-solid fa-right-to-bracket"></i></button>
            <button class="etc-btn"><i class="fa-solid fa-bell"></i></button>
            <button class="etc-btn"><i class="fa-solid fa-user"></i></button>
            </form>
        </div>
    </header>
    <main>
        <form action="./insert.php" method="post">
            <div class="main-nav">
                <div class="nav-item-1">
                </div>
                <a href="./todo_list.html"><div class="nav-item page-link">To-do List</div></a>
                <a href="./quick-memo.html"><div class="nav-item  page-link">Quick Memo</div></a>
                <a href="./my-page.html"><div class="nav-item  page-link">My Page</div></a>
            </div>
            <div class="main-container-update">
                <div class="todo-container-update">
                    <div class="todo-container-update-list">
                        <div class="update-title-place">
                            <div class="update-title">To-do 작성하기</div>
                        </div>
                        <div class="todo-pad-update-list">
                            <div class="line-content">
                                <textarea name="content" id="content" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagenation">
                    <button type="submit" class="page-move">작성</button>
                    <button><a href="./index.html" class="page-move">취소</a></button>
                </div>
            </div>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>