<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>register</title>
</head>
<body>
	<form action="#" method="POST">
		帳號：<input type="text" name="user_account" required /><br />
		密碼：<input type="password" name="user_password" required /><br />
		信箱：<input type="text" name="user_email" required /><br />
		電話：<input type="text" name="user_phone" required /><br />
		<input type="reset">
		<input type="submit">
	</form>
</body>
</html>

<?php
session_start();
require("connect.php"); 
$user_account=$_POST["user_account"];
$user_password=$_POST["user_password"];
$user_email=$_POST["user_email"];
$user_phone=$_POST["user_phone"];
$nowtime = new DateTime("now",new DateTimeZone('Asia/Taipei'));

$user_login_date=$nowtime->format("Y/m/d-h:i:s");

$add="INSERT INTO user(user_account,user_password,user_email,user_phone,user_login_times,user_login_date) VALUES('$user_account','$user_password','$user_email','$user_phone',1,'$user_login_date')";

mysqli_query($link,$add);

$_SESSION["user_account"] = $user_account;
$_SESSION["user_password"] = $user_password;
$_SESSION["user_email"] = $user_email;
$_SESSION["user_phone"] = $user_phone;
$_SESSION["user_login_date"] = $nowtime;



mysqli_close($link);
header("reg_success.php");

 ?>
