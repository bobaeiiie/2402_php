<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/bobae/config1.php");												
require_once(FILE_LIB_DB);

try {

    $conn = my_db_conn();

    $content_no = isset($_POST["content_no"]) ? $_POST["content_no"] : "";
    $page = isset($_POST["page"]) ? $_POST["page"] : "";

    $arr_param = [
        "content_no" => $content_no
    ];

    $conn->beginTransaction();
    $result = db_update_contents_checked_at($conn, $arr_param);

    $conn->commit();

    // 상세 페이지로 이동
    header("Location: detail.php?page=".$page);

} catch(\Throwable $e) {
    echo $e->getMessage();
    exit;

} finally {
    if(!empty($conn)) {
        $conn = null;
    }
}