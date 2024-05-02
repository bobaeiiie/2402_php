<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/myCommon.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> -->
    <link rel="stylesheet" href="/view/css/bootstrap/bootstrap.css">
    <script src="/view/js/bootstrap/bootstrap.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>
    <script src="/view/js/board.js" defer></script>
    <title>게시판</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mini Board</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">게시판
                            </a>
                            <ul class="dropdown-menu dropdown-menu-primary text-light">
                                <?php
                                foreach($this->arrBoardsNameInfo as $item) {
                                ?>
                                    <li><a class="dropdown-item text-dark" href="/board/list?b_type=<?php echo $item["b_type"]?>"><?php echo $item["bn_name"]?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                    <a href="/user/logout" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="text-center mt-5 mb-5">
        <h1><?php echo $this->boardName?></h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d6efd" class="bi bi-plus-circle-fill"
            viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#modal-insert">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
        </svg>
    </div>
    <main>
        <?php 
        foreach($this->arrBoardList as $item) {
        ?>
        <div class="card">
            <img src="<?php echo $item["b_img"] ?>" class="card-img-top" alt="메모">
            <div class="card-body">
                <h5 class="card-title"><?php echo $item["b_title"] ?></h5>
                <p class="card-text"><?php echo $item["b_content"] ?></p>
                <button href="#" class="btn btn-secondary my-btn-detail" data-bs-toggle="modal"
                    data-bs-target="#modal-detail" value="<?php echo $item["b_id"] ?>">상세</button>
            </div>
        </div>
        <?php 
        }
        ?>
        <!-- 상세 모달 -->
        <div class="modal" tabindex="-1" id="modal-detail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p></p>
                            <br>
                            <img src="" class="card-img-top" alt="메모">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">수정</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">삭제</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- 작성 모달 -->
        <div class="modal" tabindex="-1" id="modal-insert">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/board/add" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="b_type" value="<?php echo $this->getBoardType(); ?>">
                        <div class="modal-header">
                            <input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요">
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control" name="b_content" cols="30" rows="10" placeholder="내용을 입력하세요"
                            style="resize: none;"></textarea>
                            <br><br>
                            <input type="file" name="img" accept="image/*">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                            <button type="submit" class="btn btn-primary">작성</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="fixed-bottom bg-primary text-center text-light p-3">저작권</footer>
</body>
</html>