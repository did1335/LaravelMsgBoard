<?php
include('const.php');
//現行
function sqlconnect()
{
    global $connectionInfo, $conn;
    $connectionInfo = array("Database" => DB_NAME, "UID" => DB_UID, "PWD" => DB_PWD, "CharacterSet" => "UTF-8");
    $conn = sqlsrv_connect(DB_SERVER, $connectionInfo);
}

//取得sql資料
function fetcharray($sql)
{
    $connectionInfo = array("Database" => DB_NAME, "UID" => DB_UID, "PWD" => DB_PWD, "CharacterSet" => "UTF-8");
    $conn = sqlsrv_connect(DB_SERVER, $connectionInfo);
    $result = sqlsrv_query($conn, $sql);
    $row = sqlsrv_fetch_array($result);
    return $row;
}

function writeDB($sql)
{
    $connectionInfo = array("Database" => DB_NAME, "UID" => DB_UID, "PWD" => DB_PWD, "CharacterSet" => "UTF-8");
    $conn = sqlsrv_connect(DB_SERVER, $connectionInfo);
    $query = sqlsrv_query($conn, $sql) or die("sql error" . sqlsrv_errors());
    return $query;
}
