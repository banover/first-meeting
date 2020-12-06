<!doctype html>
<html>

<head>
  <title>그림자-오늘의 시작</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <h1><a href="index.php">Soo's Container</a></h1>
  <div class="grid">
   <div style="border-right:3px solid black" class="active">오늘의 시작</div>
   <a href="2.html" style="border-right:3px solid black">오늘의 만남</a>
   <a href="3.html" style="border-right:3px solid black">오늘의 코드</a>
   <a href="5.html" style="border-right:3px solid black">오늘의 사진</a>
   <a href="4.html">오늘의 끝</a>
  </div>

<h3>오늘의 시작</h3>
<img src="sunny.svg" >  <!--아침 그림 넣기-->
<br><br>
<h4>오늘 아침을 한 줄로 표현한다면?</h4>


<hr>

<a href="writing.html">기록하기</a>
<?php
$oneline = scandir('./data');
if (count($oneline)>=3){ ?>
<a href="correct.php>">수정하기</a> <?php } ?>


<form action="correct_process.php" method="post">
  <div class="datainput">
  <input id="date" type="date" name="date" style="width:125px; margin-right:10px;" value="<?php echo $_POST['date2'];?>">
  <input id="realtext" type="text" name="description" value="<?php echo file_get_contents("data/".$_POST['date2']);?>">
  <input id="action" type="submit" value="저장" style="width:56px;" >
</div>
<br>
</form>
<?php

$oneline = scandir('./data');
$i = 0;

while ($i<count($oneline)){
  if($oneline[$i] != '.'){
    if($oneline[$i] != '..'){

echo $oneline[$i];
echo file_get_contents("data/".$oneline[$i]);
echo '<br>';


}
}
$i=$i+1;
}

?>




</body>
</html>
