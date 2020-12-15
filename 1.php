<!doctype html>
<html>

<head>
  <title>그림자-오늘의 시작</title>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='style.php' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php

function writing(){
 ?> <a href="writing.php">기록하기</a><?php
}

function updating(){
$oneline = scandir('./data');
if(count($oneline)>=3){ ?><a href="correct.php">수정하기</a> <?php }
}


function deleting(){
$oneline = scandir('./data');
if (count($oneline)>=3){ ?>
<a href="delete.php">삭제하기</a> <?php }
}

function record(){
$oneline = scandir('./data');
$i = 0;

while ($i<count($oneline)){
  if($oneline[$i] != '.'){
    if($oneline[$i] != '..'){
echo "<ul>";
echo "<li><strong>";
echo $oneline[$i];
echo "&nbsp;&nbsp";
echo file_get_contents("data/".$oneline[$i]);
echo "</strong></li>";
echo '<br>';
echo "</ul>";

}
}
$i=$i+1;
}
}

 ?>
</head>

<body>
  <input class="logoutbut" type="button" onclick="location.href='logout.php';" value="Log Out">
  <h1><a href="index.php">Soo's Container</a></h1>
  <div class="grid">
   <div style="border-right:3px solid black" class="active">오늘의 시작</div>
   <a href="2.php" style="border-right:3px solid black">오늘의 만남</a>
   <a href="3.php" style="border-right:3px solid black">오늘의 코드</a>
   <a href="5.php" style="border-right:3px solid black">오늘의 사진</a>
   <a href="4.php">오늘의 끝</a>
  </div>

<h3>오늘의 시작</h3>
<img src="sunny.svg" >
<br><br>

<h4>오늘 아침을 한 줄로 표현한다면?</h4>


<hr class="uline">
<div class="smallmenu">

<?php writing();?>

<?php updating();?>

<?php deleting();?>

</div>

<hr class="uline">

<br>

<div class="oneline">

  <?php
  require_once "config.php";
  session_start();

  if(isset($_SESSION["username"])){
    $_SESSION["username"] = $user;
      $query = "SELECT date, description FROM oneline_record WHERE author = ?";
      $_SESSION["username"] = $author;
        if($stmt = mysqli_prepare($stmt,$query)){
          mysqli_stmt_bind_param($stmt,"s",$param_author);
          $param_author = $user;

           if(mysqli_stmt_execute($stmt)){
             $result = mysql_query($query);
               if(isset($result)){
                  while($row= mysql_fetch_array($result)){
                    echo $row['date'];
                    echo $row['description']."<br>";
               }
             }else{
               echo"두번째 if문 ";

             }
           }
        }









  } else{
    echo"첫if문 오류";
  }


  ?>


</div>
</body>
</html>
