<?php

$host = '数据库地址';
$user = '账号';
$pwd = '密码';
$dbname = '数据库名';

$db = new mysqli($host, $user, $pwd, $dbname);
if (!$db) {
  die("数据库连接失败！！！" . mysqli_connect_error());
}

mysqli_query($db, "SET NAMES UTF8");

if (filter_input(INPUT_SERVER, "REQUEST_METHOD") === "GET") {
  mysqli_close($db); //直接访问此文件时关闭数据库！
}
