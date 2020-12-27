<?php

require_once "config.php";
session_start();



    $target_dir = 'videos/';
    $target_file = $target_dir . $_FILES['video_name']['name'];
    $sql= "UPDATE videos SET video_location = '{$target_file}' WHERE username = '{$_SESSION['username']}' AND date ='{$_POST['date']}'";
    if($result = mysqli_query($link,$sql)){
      header('location:realindex.php?id='.$_GET['id'].'');
    }






 ?>
