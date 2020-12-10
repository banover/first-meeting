<!doctype html>
<html>

<head>
  <title>그림자-오늘의 사진</title>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='style.php' />
  <?php
  function uploading(){
   ?> <a href="uploading.php">등록하기</a><?
  }

  function updating(){
  $oneline = scandir('./images');
  if (count($oneline)>=3){ ?>
  <a href="correctpicture.php">수정하기</a> <?php }
  }

  function deleting(){
  $oneline = scandir('./images');
  if (count($oneline)>=3){ ?>
  <a href="deletepicture.php">삭제하기</a> <?php }
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
<h4>오늘의 사진 한 1장은?</h4>
<hr class="uline">


<div class="smallmenu">
<?php uploading(); ?>
<?php updating(); ?>
<?php deleting();?>



</div>

<hr class="uline">

<div class="picon">
<form action="deletepicture_process.php" method="post" enctype="multipart/form-data">

<input type="date" name="date">
<!--<input type="hidden" name="hidden" value="noway">-->
<input type="submit" value="사진 삭제" name="submit">

</form>
</div>


<div class="picposition">
<?php

$onepicture = scandir('./images');
$i = 0;

while ($i<count($onepicture)){
  if($onepicture[$i] != '.'){
    if($onepicture[$i] != '..'){
echo "<ul>";
echo "<li><strong>".$onepicture[$i]."</strong></li>";
echo "<img src=images/".$onepicture[$i]." height=200 width=300/>";
echo "</ul>";


//이미지 주소로도 사진등록 하는 기능도 추가하면 좋을 듯
}
}
$i=$i+1;
}

?>
</div>



</body>


</html>
