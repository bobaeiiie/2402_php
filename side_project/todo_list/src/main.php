<?php 

require_once($_SERVER["DOCUMENT_ROOT"]."/bobae/config1.php"); 								
require_once(FILE_LIB_DB); 

// POST 처리
// GET 처리 필요 없음. 화면 표시만 함
if(REQUEST_METHOD === "POST") { // 
    try{
        // 파라미터 획득
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 획득
        // title만 체크하고 멈추면 안되기 때문에 따로따로 체크해야 함.
        
        // 파라미터 에러 체크
        $arr_err_param = [];
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
            "content" => $content
        ];
        $result = db_insert_boards($conn, $arr_param);

        // 글 작성 예외처리
        if($result !== 1) {
            throw new Exception("Insert Boards count"); // 혹시라도 모를 예외 상황을 대비하기 위해. 프로젝트 때에는 넣지 않아도 됨.
        }

        // 커밋
        $conn->commit();

        // 리스트 페이지로 이동
        header("Location: detail.php");
        // exit;

    } catch(\Throwable $e) {
        if(!empty($conn)) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        // exit;

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
    <link rel="stylesheet" href="./css/todo_list.css?after">
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
                    <div><h1><a href="./main.php" class="logo-text">TO-DO LIST</a></h1></div>
                    <div> </div>
                </div>
                <div class="search">
                    <form action="./main.php" method="post">
                        <input class ="insert-input" type="text" name="content" id="content" placeholder="   Todo를 추가하세요.">
                        <button class="plus-btn" type="submit"><i class="fa-solid fa-plus fa-beat"></i></button>

                    </form>
                </div>
            </div>
        </main>
        <main2>
            <div class="main-to-page-container">
                <a href="./todo_list.php"><div class="main-to-page">To-Do List</div></a>
                <a href="./todo_list.php"><div class="main-to-page">Quick Memo</div></a>
                <a href="./todo_list.php"><div class="main-to-page">My Page</div></a>
            </div>
        </main2>
        <footer>
        </footer>
    </div>

    


</body>
</html>



