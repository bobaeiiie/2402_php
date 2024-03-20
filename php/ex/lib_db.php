<?php

/**
 * 
 * DB정보 작성 및 PDO 객체 반환
 * 
 * @return PDO PDO객체
 */
function db_conn() {
    $dbHost     = "localhost";
    $dbUser     = "root";
    $dbPw       = "php505";
    $dbName     = "employees";
    $dbCharset  = "utf8mb4";
    $dbDsn      = "mysql:host=".$dbHost.";dbname=".$dbName.";charset=".$dbCharset;

    $opt = [
        PDO::ATTR_EMULATE_PREPARES      => false
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];
    return new PDO($dbDsn, $dbUser, $dbPw, $opt);
}






