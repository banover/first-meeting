<?php


function updated_oneline(){
  session_start();
  require_once "config.php";
if(isset($_SESSION['username']) && isset($_POST['date'])){
 $sql = "SELECT description FROM oneline_record WHERE author=? AND date =?";
 if($stmt = mysqli_prepare($link,$sql)){
   mysqli_stmt_bind_param($stmt,"ss", $param_author, $param_date);
   $param_author = $_SESSION['username'];
   $param_date = $_POST['date'];
   if(mysqli_stmt_execute($stmt)){
     mysqli_stmt_store_result($stmt);
     mysqli_stmt_bind_result($stmt,$description);
     if(mysqli_stmt_fetch($stmt)){
       printf ("%s", $description);
     }

  }
 }

}

}


 ?>

<?php
updated_oneline(); ?>
