<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bobae/config1.php"); // 설정 파일 호출								
require_once(FILE_LIB_DB); // DB 관련 라이브러리 호출

try {
    // DB Connect
    $conn = my_db_conn(); //PDO 인스턴스 생성

    // Method 체크
    if(REQUEST_METHOD === "GET") {
        // 게시글 데이터 조회
        // 파라미터 획득
        $no = isset($_GET["content_no"]) ? $_GET["content_no"] : ""; // no 획득
        $page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 획득

        // 파라미터 예외 처리
        $arr_err_param = []; // 초기화 시 데이터타입 알림. 
        if($no === "") {
            $arr_err_param[] = "content_no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }

        // 게시글 정보 획득
        $arr_param = [
            "content_no" => $no
        ];
        $result = db_select_boards_no($conn, $arr_param);
        if(count($result) !==1) {
            throw new Exception("Select Boards no count");
        }

        // 아이템 셋팅
        $item = $result[0];
        }

    else if(REQUEST_METHOD === "POST") {
        // 파라미터 획득
        $no =isset($_POST["content_no"]) ? $_POST["content_no"] : "";


        // 파라미터 예외 처리
        $arr_err_param = []; // 초기화 시 데이터타입 알림. 
        if($no === "") {
            $arr_err_param[] = "content_no";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }
        
            // Transaction 시작
            $conn->beginTransaction();

            // 게시글 정보 삭제
            $arr_param = [
                "content_no" => $no
            ];
            $result = db_delete_boards_no($conn, $arr_param);

            // 석제 예외 처리
            if($result !== 1) {
                throw new Exception("Delete Boards no count");
            }
            //commit
            $conn->commit();

            // 리스트 페이지로 이동
            header("Location: ./detail.php");
            exit;
    }

} catch(\Throwable $e) {
    if(!empty($conn)) {
        $conn->rollBack();
    }
    echo $e->getMessage();
    // exit;

} finally {
    // PDO 파기
    if(!empty($conn)) {
        $conn = null;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/todo_list.css">
    <title>삭제 페이지</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></link>

</head>
<body>
    <header>
        <div><h1><a href="./main.php">TO-DO LIST</a></h1></div>
        <div></div>
        <div class="main-etc">
            <button class="etc-btn"><i class="fa-solid fa-right-to-bracket"></i></button>
            <button class="etc-btn"><i class="fa-solid fa-bell"></i></button>
            <button class="etc-btn"><i class="fa-solid fa-user"></i></button>
            </form>
        </div>
    </header>
    <main>
        <form action="./delete.php" method="post">
            <div class="main-nav">
                <div class="nav-item-1">
                </div>
                <a href="./todo_list.php"><div class="nav-item page-link">To-do List</div></a>
                <a href="./todo_list.php"><div class="nav-item  page-link">Quick Memo</div></a>
                <a href="./todo_list.php"><div class="nav-item  page-link">My Page</div></a>
            </div>
            <div class="main-container-update">
                <div class="todo-container-update-list">
                    <div class="update-title-place">
                        <div class="update-title">To-do 삭제하기</div>
                    </div>
                    <div class="todo-pad-update-list">
                        <div class="chkbox-place-update">
                            <label for="chkbox"><div class="content-title-update"><?php echo $item["content"]; ?></div></label>
                        </div>
                        <div class="created-at-update"><?php echo $item["created_at"]; ?></div>
                    </div>
                </div>
                <div class="pagenation">
                    <input type="hidden" name="content_no" value="<?php echo $no; ?>">
                    <button type="submit" class="page-move">삭제</button>
                    <a href="./detail.php?no=<?php echo $no; ?>&page=<?php echo $page; ?>" class="page-move">취소</a>
                </div>

            </div>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>

