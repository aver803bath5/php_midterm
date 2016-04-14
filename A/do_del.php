<?php 
	session_start();
	if ($_SESSION["user_account"]==NULL) {
	header("Location:log.php");
}else{
	require("connect.php");
	$user=$_SESSION["user_account"];
	$del="DELETE FROM user WHERE user_account='$user'";
	mysqli_query($link,$del);
	$_SESSION["user_account"]=NULL;
	echo "刪除成功，三秒後返回登入頁面";
	header("refresh:3;url=log.php");
}
 ?>
