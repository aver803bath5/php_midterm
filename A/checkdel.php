<?php 
session_start(); 
if ($_SESSION["user_account"]==NULL) {
	header("Location:log.php");
}else{
 ?>
 <input type ='button' onclick="javascript:location.href='do_del.php'" value='確定刪除？'></input>
 <?php 
}
  ?>
