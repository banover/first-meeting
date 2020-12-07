<!doctype html>
<html>

<head>
 <title>그림자-오늘의 끝</title>
 <meta charset="UTF-8">
 <link rel='stylesheet' type='text/css' href='style.php' />
 <?php
 function writing(){
  ?> <a href="writing.html">기록하기</a><?
 }

 function updating(){
 $oneline = scandir('./data');
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
   <a href="2.php" style="border-right:3px solid black">오늘의 만남</a>
   <a href="3.php" style="border-right:3px solid black">오늘의 코드</a>
   <a href="5.php" style="border-right:3px solid black">오늘의 사진</a>
   <div class="active">오늘의 끝</div>
  </div>

<h3>오늘의 끝</h3>
<img src="moon.svg"> <!--하루마감에 관련된 사진 넣기-->
<br><br>
<h4>오늘의 마지막을 한 줄로 표현한다면?</h4>
<hr>
<form action="//form-result.php" target="_self">
  <div class="datainput">
<input type="date" name="작성일"style="width:125px; margin-right:10px;">
<input type="text" name="한 줄글" placeholder="한 줄글 입력">
<button type="submit" style="width:56px;">저장</button>
</div>
</body>

</html>
