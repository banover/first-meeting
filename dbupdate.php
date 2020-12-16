<?php
session_start();
require_once "config.php";



 $sql = "SELECT id FROM oneline_record WHERE author=?";
 if($stmt = mysqli_prepare($link,$sql)){
   mysqli_stmt_bind_param($stmt, "s", $param_author);
   $param_author = $_SESSION['username'];
   if(mysqli_stmt_execute($stmt)){
     mysqli_stmt_store_result($stmt);
     if(mysqli_stmt_num_rows($stmt)>0){ ?>
       <a href="correct.php">수정하기</a> <?php
     }else{
       echo"";
     }
     }else{
       echo"execute오류";
     }

     }else{
       echo"prepare오류";
     }

?>
