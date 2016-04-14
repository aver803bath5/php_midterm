<?php
session_start();

if (empty($_SESSION['user_account'])) {
 	header("Location:log.php");
 }else{ 
echo $_SESSION["user_account"];
echo "歡迎回來<br />";
echo "上次登入時間為";
$user=$_SESSION["user_account"];
require("connect.php");
$read="SELECT user_login_date FROM user WHERE user_account='$user'";
$readresult=mysqli_query($link,$read);
while($result=mysqli_fetch_array($readresult)){
	echo $result["0"];
}
$nowtime = new DateTime("now",new DateTimeZone('Asia/Taipei'));
$now=$nowtime->format("Y:m:d:h:i:s");
$update="UPDATE user SET user_login_date='$now' WHERE user_account='$user'";
mysqli_query($link,$update);

 
 echo "<a href='profile.php'>更改個人資料</a>";
 }
 ?>