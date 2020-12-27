<?php
require_once "config.php";
session_start();


if(isset($_POST['date'])){
  $date_sql= "SELECT*FROM videos WHERE username='{$_SESSION['username']}' AND date ='{$_POST['date']}'";
  $date_result = mysqli_query($link,$date_sql);
    if(mysqli_num_rows($date_result) == 1){
    header('location:video_uploading.php?id='.$_GET['id'].''); //mysqli_stmt_num_rows
  } else{

    if(isset($_POST['video_upload'])){
    $maxsize = 5242880;
    $upload_video_name = $_FILES['video_name']['name'];
    $target_dir = "videos/";
    $target_file = $target_dir . $_FILES['video_name']['name'];
    $videoFillType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("mp4", "avi","3gp","mov","mpeg");
     if(in_array($videoFillType,$extensions_arr)){
       if(($_FILES['video_name']['size'] >= $maxsize) || ($_FILES["video_name"]["size"] == 0)) {
                echo "파일의 크기는 5MB이하여야 합니다";
     } else{
       if(move_uploaded_file($_FILES['video_name']['tmp_name'],$target_file)){
         $query = "INSERT INTO videos (username,date,video_location) VALUES('{$_SESSION['username']}','{$_POST['date']}','{$target_file}')"; //문제생기면 VALUES 괄호 안 구조 바꾸기
         mysqli_query($link,$query);
         header('location:realindex.php?id='.$_GET['id'].'');
       }
     }



    }
    }
  }
} else{
  echo"isset 오류";
}






 ?>
