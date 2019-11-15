<?php

require 'input.php';
require 'sql.php';

$contenta = filter_input(INPUT_POST, 'content');
$contentb = str_replace('<', '&lt;', $contenta);
$content = str_replace('>', '&gt;', $contentb);
$usera = filter_input(INPUT_POST, 'user');
$userb = str_replace('<', '&lt;', $usera);
$user = str_replace('>', '&gt;', $userb);
//php有好的方法来替换实体字符、此处为基础学习，不使用。
//留言内容采取直接输出html的方式，而非js动态创建element也是为了先学习基础，后面如果你学习了ajax可以尝试修改。
if (filter_input(INPUT_POST, 'img') !== null) {
  $img = filter_input(INPUT_POST, 'img');
} else {
  $img = null;
}

$inputcheck = new inputcheck();
if ($inputcheck->postCheck($user) == false) {
  die('留言人格式不正确！');
}

$time = date("Y-m-d H:i:s", time());
$insertsql = "INSERT INTO `leavewords` (img,content,user,intime) VALUES ('{$img}','{$content}','{$user}','{$time}')";
if ($content !== "" && $user !== "") {
  mysqli_query($db, $insertsql);
  header('Location: index.php');
}

mysqli_close($db);
