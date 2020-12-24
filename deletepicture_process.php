<?php
require_once "config.php";
session_start();


if(isset($_POST["submit"])){
  $sql = "DELETE FROM image WHERE username=? AND date =? ";
  $imagefile_savename = $_POST['date'];
    if($stmt=mysqli_prepare($link,$sql)){
    mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_date);
    $param_username = $_SESSION['username'];
    $param_date = $_POST['date'];
    if(mysqli_stmt_execute($stmt)){
      unlink('images/'.$imagefile_savename);
      header('Location: /realindex.php?id='.$_GET['id'].'');

    } else {
      echo"execute";
    }
  }else{
    echo"prepare";
  }
}

 ?>
