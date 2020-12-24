<?php
require_once "config.php";

$author = $date = $description = "";

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

//날짜중복 걷어내기 단계
if(isset($_POST['date'])){

  $sql = "SELECT id From oneline_record WHERE author =? AND date = ?"; ////id - author
    if($stmt = mysqli_prepare($link,$sql)){
     mysqli_stmt_bind_param($stmt,"ss", $param_author,$param_date);
      $param_author = $_SESSION['username'];
      $param_date = $_POST['date'];

     if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);
       if(mysqli_stmt_num_rows($stmt) == 1){
           echo "이미 글이 등록된 날짜입니다";
           header('location:writing.php');
  } else{

    if(isset($_POST['date']) && isset($_SESSION['username']) && isset($_POST['description'])){
      $date = $_POST['date'];
      $author = $_SESSION['username'];
   $description = $_POST['description'];


          } else{
            echo "날짜를 입력해주세요";
          }


      if(isset($date) && isset($description) && isset($author)){
        $sql = "INSERT INTO oneline_record (author, date, description) VALUES(?, ?, ?)";
          if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_author, $param_date, $param_description);

              $param_author = $author;
              $param_date = $date;
              $param_description = $description;

              if(mysqli_stmt_execute($stmt)){
                  header('location:/realindex.php?id='.$_GET['id'].'');

              } else{
                echo"stmt실행오류";
              }

                 mysqli_stmt_close($stmt);
              } else{
                echo"두번째...DB로 명령문이 전달안됨";
               }


      }else{
      header('location:/writing.php');
       }

  mysqli_close($link);

  }

  } else{
  echo"첫 execut오류";
  }

  }else{
  echo"첫 prepare오류";

  }

}
}
 ?>
<!--writing_process.php 시리즈로 옮기는게 맞음(data폴더에 연결한걸 db로 연결)
