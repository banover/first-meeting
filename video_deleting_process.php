<?php

require_once "config.php";
session_start();

$sql= "DELETE FROM videos WHERE username='{$_SESSION['username']}' AND date ='{$_POST['date']}'";
if($result = mysqli_query($link,$sql)){
  header('location:realindex.php?id='.$_GET['id'].'');

}





 ?>
