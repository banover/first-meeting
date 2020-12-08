<!doctype html>
<html>

<head>
  <title>그림자-오늘의 사진</title>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='style.php' />
  <?php
  function writing(){
   ?> <a href="writing5.html">등록하기</a><?
  }

  function updating(){
  $oneline = scandir('./data5');
  if (count($oneline)>=3){ ?>
  <a href="correct5.php">수정하기</a> <?php }
  }

  function deleting(){
  $oneline = scandir('./data5');
  if (count($oneline)>=3){ ?>
  <a href="delete5.php">삭제하기</a> <?php }
  }

  function record(){
  $oneline = scandir('./data5');
  $i = 0;

  while ($i<count($oneline)){
    if($oneline[$i] != '.'){
      if($oneline[$i] != '..'){
  echo "<ul>";
  echo "<li><strong>";
  echo $oneline[$i];
  echo "&nbsp;&nbsp";
  echo file_get_contents("data5/".$oneline[$i]);
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
  <h1><a href="index.php">Soo's Container</a></h1>
  <div class="grid">
  <a href="1.php" style="border-right:3px solid black">오늘의 시작</a>
   <a href="2.php" style="border-right:3px solid black">오늘의 만남</a>
   <a href="3.php" style="border-right:3px solid black">오늘의 코드</a>
   <div style="border-right:3px solid black" class="active">오늘의 사진</div>
   <a href="4.php">오늘의 끝</a>
  </div>

<h3>오늘의 사진</h3>
<img src="photo-camera.svg" >
<br><br>
<h4>오늘의 사진은?</h4>
<hr class="uline">


<form action="5.php" method="post" enctype="multipart/form-data">
<input type="date" name="date">
<input type="file" name="file" id="upload">
<input type="submit" value="올리기" name="submit1">
</form>

<hr class="uline">

<?php

if(isset($_POST["submit1"])){
$filepath = "images/".$_FILES["file"]["name"];

if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)){
  echo "<img src=".$filepath." height=200 width=300/>";

}
else{
  echo "오류!!";
}
}
?>


</body>


</html>
