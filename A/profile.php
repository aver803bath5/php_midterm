<?php
session_start(); 
if ($_SESSION["user_account"]==NULL) {
	header("Location:index.php");
}else{ 
session_start();
require("connect.php");
$user=$_SESSION["user_account"];
$read="SELECT * FROM user WHERE user_account='$user'";
$readresult=mysqli_query($link,$read);
$result=mysqli_fetch_array($readresult);
echo "<form action='do_update.php' method='post'>";
	echo "<input type='hidden' name='user_id' value='".$result[0]."' />";
	echo "使用者名稱："."<input type='text' name='user_account' value='".$result[1]."' /><br />";
	echo "使用者密碼："."<input type='text' name='user_password' value='".$result[2]."' /><br />";
	echo "使用者信箱："."<input type='text' name='user_email' value='".$result[3]."' /><br />";
	echo "使用者電話："."<input type='text' name='user_phone' value='".$result[4]."' /><br />";
	echo "<input type='submit' value='更新' />";
	echo "<input type='reset' value='清除' />";
	echo "</form>";
}
 ?>
 <input type ='button' onclick='javascript:location.href=","'checkdel.php'"," value='刪除'></input>

