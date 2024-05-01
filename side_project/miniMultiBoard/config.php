<?php

define("_ROOT", $_SERVER['DOCUMENT_ROOT']."/");

// MariaDB 관련
define("_MARIA_DB_HOST", "localhost");
define("_MARIA_DB_PORT", "3306");
define("_MARIA_DB_USER", "root");
define("_MARIA_DB_PW", "php505");
define("_MARIA_DB_NAME", "mini_multi_board");
define("_MARIA_DB_CHARSET", "utf8mb4");
define("_MARIA_DB_DNS",
        "mysql:host="._MARIA_DB_HOST
        .";pdort="._MARIA_DB_PORT
        .";dbname="._MARIA_DB_NAME
        .";charset="._MARIA_DB_CHARSET);

