<?php
session_start();
require_once "config.php";


  if(isset($_POST['date'])){
  $date = $_POST['date'];
  //  $_SESSION['username'] = $author;
    $sql="DELETE FROM oneline_record WHERE date = ?";
    if($stmt = mysqli_prepare($link,$sql)){
       mysqli_stmt_bind_param($stmt, "s", $param_date);
        $param_date = $date;
       if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);

         header('location:1.php');

       } else{
         echo"execute오류";
       }

    }else{
      echo"prepare오류";
    }
  }else{
    echo"isset오류";
  }

//일단 삭제하기 적용시킨후에 AND author를 $sql에 붙여넣어야..



 ?>
