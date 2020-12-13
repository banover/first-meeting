<!doctype html>
<html>

<head>
  <title>그림자-오늘의 코드</title>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='style.php' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php
  function writing(){
   ?> <a href="writing3.php">기록하기</a><?php
  }

  function updating(){
  $oneline = scandir('./data3');
  if (count($oneline)>=3){ ?>
  <a href="correct3.php">수정하기</a> <?php }
  }

  function deleting(){
  $oneline = scandir('./data3');
  if (count($oneline)>=3){ ?>
  <a href="delete3.php">삭제하기</a> <?php }
  }

  function record(){
  $oneline = scandir('./data3');
  $i = 0;

  while ($i<count($oneline)){
    if($oneline[$i] != '.'){
      if($oneline[$i] != '..'){
  echo "<ul>";
  echo "<li><strong>";
  echo $oneline[$i];
  echo "&nbsp;&nbsp";
  echo file_get_contents("data3/".$oneline[$i]);
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
    <div style="border-right:3px solid black" class="active">오늘의 코드</div>
    <a href="5.php" style="border-right:3px solid black">오늘의 사진</a>
    <a href="4.php">오늘의 끝</a>
  </div>


<h3>오늘의 코드</h3>
<img src="binary-code.svg" >  <!--아침 그림 넣기-->
<br><br>
<h4>오늘의 코드를 한 줄로 표현한다면?</h4>

<hr class="uline">
<div class="smallmenu">
  <?php writing();?>

  <?php updating();?>

  <?php deleting();?>

</div>
<hr class="uline">

<form action="writing_process3.php" method="post">
  <div class="datainput">
<input id="date" type="date" name="date"style="width:125px; margin-right:10px;">
<input id="realtext" type="text" name="description" placeholder="한 줄글 입력" >
<input id="action" type="submit" value="저장" style="width:56px;" >
</div>
</form>

<div class="oneline">
<?php record();?>



</div>

<!--input type range써서 기분수치 표현 기능 넣어도 재밌을듯-->
<!--저장누른 후 페이지에 한 줄글 나란히 기록되게 하고, 월별로 저장된 글 보여주는거
만들기-->
</body>



</html>
