<?php 
session_start(); 
if ($_SESSION["user_account"]==NULL) {
	header("Location:log.php");
}else{
require("connect.php");
$user_id=$_POST["user_id"];
$user_account=$_POST["user_account"];
$user_password=$_POST["user_password"];
$user_email=$_POST["user_email"];
$user_phone=$_POST["user_phone"];
$update="UPDATE user SET user_account='$user_account',user_password='$user_password',user_email='$user_email',user_phone='$user_phone' WHERE user_id='$user_id'";
	mysqli_query($link,$update);
$_SESSION["user_account"] = $user_account;
$_SESSION["user_password"] = $user_password;
$_SESSION["user_email"] = $user_email;
$_SESSION["user_phone"] = $user_phone;
$_SESSION["user_login_date"] = $nowtime;
echo "更新成功，三秒後跳到主頁";
header('refresh:3;url=index.php');
}
 ?>