<?php
require_once "config.php";
session_start();

$sql="DELETE FROM menus WHERE username ='{$_SESSION['username']}' AND menu_name ='{$_POST['menu_name']}'";
if(mysqli_query($link,$sql)){
  header('location:realindex.php');
} else {
  echo"gg";
}




 ?>
