<?php

if(isset($_POST['date'])){
  $date_sql= "SELECT*FROM videos WHERE username='{$_SESSION['username']}' AND date ='{$_POST['date']}'";
  $date_result = mysqli_query($link,$date_sql);
  $row = mysqli_fetch_array($date_result);
  if(isset($row)){
    header('location:video_uploading.php?id='.$_GET['id'].'');
  }



}

 ?>
