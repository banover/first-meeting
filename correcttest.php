<?php
session_start();
require_once "config.php";


  if(isset($_POST['date']) && isset($_POST['description']) && isset($_SESSION['username'])){
  $date = $_POST['date'];
  $description = $_POST['description'];
  $author = $_SESSION['username'];
    $sql="INSERT INTO oneline_record(author, date, description) VALUES(?,?,?)";
    if($stmt = mysqli_prepare($link,$sql)){
       mysqli_stmt_bind_param($stmt, "s", $param_date);
        $param_date = $date;
       if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          $sql2="INSERT INTO oneline_record(author, date, description) VALUES(?,?,?)"
          if()



       } else{
         echo"execute오류";
       }

    }else{
      echo"prepare오류";
    }
  }else{
    echo"isset오류";
  }
//같은date 있는지 check후 지우고 post된 내용으로 INSERT하는게 맞을듯..위 코드 다 갈아엎어야됨;
//correct_date.php에는 post(date)로 description을 input(text)에 placeholder하기



// header('location:1.php');
 ?>
