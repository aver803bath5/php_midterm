<?php
session_start(); 
if ($_SESSION["user_account"]!=NULL) {
	header("Location:index.php");
}
// echo $_SESSION["user_account"];
 ?>

<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>log</title>
</head>
<body>
	<form action="#" method="POST">
		帳號：<input type="text" name="user_account"><br />
		密碼：<input type="password" name="user_password"><br />
		<input type="reset">
		<input type="submit">
	</form>
</body>
</html>

<?php
session_start(); 
require("connect.php");
$nowtime = new DateTime("now",new DateTimeZone('Asia/Taipei'));
$read="SELECT user_account,user_password,user_login_times,user_login_date FROM user";
$readresult=mysqli_query($link,$read);
while($result=mysqli_fetch_array($readresult)){
	if($result[0]==$_POST["user_account"]){
		if($result[1]==$_POST["user_password"]){
			$_SESSION["user_account"] = $result[0];
			$_SESSION["user_password"] = $result[1];
			$_SESSION["user_login_date"] = $nowtime;
			$now=$nowtime->format("Y/m/d-h:i:s");
			$now=date_create_from_format('Y/m/d-h:i:s', $now);
			$last_time=date_create_from_format('Y/m/d-h:i:s', $result[3]);
			if ($now->diff($last_time)->days>0) {
				$times=$result[2]+1;
				$update="UPDATE user SET user_login_times='$times' WHERE user_account='$result[0]'";
				mysqli_query($link,$update);
			}
			header("Location:index.php");
		}
	}
}
echo "帳號或密碼錯誤，請再試一次";
 ?>
