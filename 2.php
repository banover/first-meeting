<!doctype html>
<html>

<head>
 <title>그림자-오늘의 만남</title>
 <meta charset="UTF-8">
 <link rel='stylesheet' type='text/css' href='style.php' />
 <?php
 function writing(){
  ?> <a href="writing.html">기록하기</a><?
 }

 function updating(){
 $oneline = scandir('./data2');
 if (count($oneline)>=3){ ?>
 <a href="correct.php">수정하기</a> <?php }
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
  <h1><a href="index.php">Soo's Container</a></h1>
  <div class="grid">
   <a href="1.php" style="border-right:3px solid black">오늘의 시작</a>
   <div style="border-right:3px solid black" class="active">오늘의 만남</div>
   <a href="3.php" style="border-right:3px solid black">오늘의 코드</a>
   <a href="5.php" style="border-right:3px solid black">오늘의 사진</a>
   <a href="4.php">오늘의 끝</a>
  </div>

<h3>오늘의 만남</h3>
<img src="meeting.svg"> <!--만남에 관련된 사진 넣기-->
<br><br>
<h4>오늘 만남을 한 줄로 표현한다면?</h4>
<hr>

<a href="writing2.php">기록하기</a>

<?php
$oneline = scandir('./data');
if (count($oneline)>=3){ ?>
<a href="correct2.php">수정하기</a> <?php } ?>

<?php
$oneline = scandir('./data');
if (count($oneline)>=3){ ?>
<a href="delete2.php">삭제하기</a> <?php } ?>




<br>
<?php
$oneline2 = scandir('./data2');
$i = 0;

while ($i<count($oneline2)){
  if($oneline2[$i] != '.'){
    if($oneline2[$i] != '..'){

echo $oneline2[$i];
echo file_get_contents("data/".$oneline2[$i]);
echo '<br>';


}
}
$i=$i+1;
}

?>
</body>

</html>
