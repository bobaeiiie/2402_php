<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mini Board</a>
            <?php if($_GET["url"] !== "user/login" && $_GET["url"] !== "user/regist") {
            ?>

                <!-- <a class="navbar-brand text-end" href="#">이름</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item drozpdown">
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
                    <a href="/user/edit" class="navbar-nav nav-link text-light" role="button">내 정보 수정</a>
                    <a href="/user/logout" class="navbar-nav nav-link text-light" role="button">로그아웃</a>
                </div>
                </div>
            <?php    
            }
            ?>
        </nav>
    </header>