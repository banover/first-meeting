<?php

require_once "config.php";
session_start();




 $sql = "SELECT id FROM oneline_record WHERE author=?";
 if($stmt = mysqli_prepare($link,$sql)){
   mysqli_stmt_bind_param($stmt, "s", $param_author);
   $param_author = $_SESSION['username'];
   if(mysqli_stmt_execute($stmt)){
     mysqli_stmt_store_result($stmt);
     if(mysqli_stmt_num_rows($stmt)>0){ ?>
       <a href="delete.php">삭제하기</a> <?php
     }else{
       echo"numrow오류";
     }
     }else{
       echo"execute오류";
     }

     }else{
       echo"prepare오류";
     }



?>
