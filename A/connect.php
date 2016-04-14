<?php 
$host="localhost";
$db_user="root";//用户名
$db_pass="123456";//密码
$db_name="midterm";//数据库
$timezone="Asia/Taipei";

$link=mysqli_connect($host,$db_user,$db_pass,$db_name);
mysqli_query($link,"SET names UTF8");

header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set($timezone); //台灣時間
 ?>