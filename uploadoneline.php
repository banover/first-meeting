<?php
require_once "config.php"
session_start();
if(isset($_SESSION['username'])){

  if(isset($_POST['date'])) && isset($_POST['description']){
    $sql = "INSERT INTO oneline_record (author, date, description )
    VALUES(?,?,?)";

  }else{
    header('location:writing.php');
  }

//여기에 날짜중복을..1) date있나? 2)있으면 $sql 작성(db서 같은 날짜거 SElECT해오기)
//3)같은 날짜거 있으면 $date_err ="" 4) 없으면 $date=$_POST['date'];
//위 내용을 위 두번째 if문 자리에서 검증하고 쭉 내려가면될듯..


 if($stmt = mysqli_prepare($link, $sql)){
   mysqli_stmt_bind_param($stmt, "sis", $param_author, $param_date, $param_description);
 }
 if(mysqli_stmt_execute($stmt)){
   mysqli_stmt_store_result($stmt);
  // if(mysqli_stmt_num_rows($stmt) == 1){ }//날짜겹치는건 중복돼서 안된다고 해야..

  header('location:1.php');
 }

} else{
  header('location:index.php');
}


 ?>
<!--writing_process.php 시리즈로 옮기는게 맞음(data폴더에 연결한걸 db로 연결)
