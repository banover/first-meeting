<?php
session_start();
require_once "config.php";


if(isset($_POST['date'])){
  $sql = "SELECT id From oneline_record WHERE author =? AND date = ?"; ////id - author
    if($stmt = mysqli_prepare($link,$sql)){
     mysqli_stmt_bind_param($stmt,"ss", $param_author,$param_date);
      $param_author = $_SESSION['username'];
      $param_date = $_POST['date'];

     if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);
       if(mysqli_stmt_num_rows($stmt) == 1){



               if(isset($_POST['date']) && isset($_SESSION['username']) && isset($_POST['description'])){
                 $date = $_POST['date'];
                 $author = $_SESSION['username'];
                 $description = $_POST['description'];
                 if(isset($date) && isset($description) && isset($author)){
                   $sql2 = "UPDATE oneline_record SET description = ? WHERE author = ? AND date = ?" ;
                     if($stmt = mysqli_prepare($link, $sql2)){
                       mysqli_stmt_bind_param($stmt, "sss", $param_description, $param_author, $param_date);

                         $param_description = $description;
                         $param_author = $author;
                         $param_date = $date;

                         if(mysqli_stmt_execute($stmt)){
                            header('location:/1.php');
                       }
           }
         }
       }


            }

             }
           }
  }


 ?>
