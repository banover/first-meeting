<!doctype html>
<html>

<head>
  <title>그림자-오늘의 사진</title>
  <meta charset="utf-8">
  <link rel='stylesheet' type='text/css' href='style.php' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php
  require_once "config.php";
  session_start();

  function image_uploading(){
   ?> <a href="uploading.php">등록하기</a><?php
  }

  function image_updating(){
  $oneline = scandir('./images');
  if (count($oneline)>=3){ ?>
  <a href="correctpicture.php">수정하기</a> <?php }
  }

  function image_deleting(){
  $oneline = scandir('./images');
  if (count($oneline)>=3){ ?>
  <a href="deletepicture.php">삭제하기</a> <?php }
  }


    function image_reading(){
    global $link;
    $sql = "SELECT date, image FROM image WHERE username=? ";
    $username = $_SESSION['username'];
    if($stmt = mysqli_prepare($link,$sql)){
      mysqli_stmt_bind_param($stmt,"s",$param_username);
      $param_username = $username;
      if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);

           if(mysqli_stmt_num_rows($stmt) > 0){

                mysqli_stmt_bind_result($stmt, $date, $image);

               while(mysqli_stmt_fetch($stmt)){
                  echo "<ul>";
                  echo "<li><strong>".$date."</strong></li>";
                  echo "<img src=images/".$image." height=200 width=300/>";
                  echo "</ul>";
               }
            }
          }
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
<img src="photo-camera.svg" >  <!--아침 그림 넣기-->
<br><br>
<h4>오늘의 사진 1장은?</h4>

<hr class="uline">
<div class="smallmenu">
  <?php image_uploading();?>

  <?php image_updating();?>

<?php image_deleting();?>

</div>
<hr class="uline">

<div class="picon">
<form action="correctpicture_process.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">

<input type="date" name="date">
<!--<input type="hidden" name="hidden" value="noway">-->
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="사진 재등록" name="submit">

</form>
</div>

</form>
<br>

<div class="picposition">
<?php

image_reading();

?>
</div>


<!--<form action="correct_process.php" method="post">






  <div class="datainput">
  <input id="date" type="date" name="date"style="width:125px; margin-right:10px;" value="">
  <input id="realtext" type="text" name="description" placeholder="한 줄글 입력" >
  <input id="action" type="submit" value="저장" style="width:56px;" >
</div>

</form>-->





</body>
</html>
