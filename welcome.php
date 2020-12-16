<?php session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: index.php");
    exit;
}
?>




<!doctype html>
<html>

<head>
 <title>그림자</title>
 <meta charset="UTF-8">
 <link rel='stylesheet' type='text/css' href='style.php' />
</head>

<body>
   <input class="logoutbut" type="button" onclick="location.href='logout.php';" value="Log Out">
    <h1><a href="index.php">Soo's Container</a></h1>
 <div class="grid">
<a href="1.php" style="border-right:3px solid black">오늘의 시작</a>
  <a href="2.php" style="border-right:3px solid black">오늘의 만남</a>
  <a href="3.php" style="border-right:3px solid black">오늘의 코드</a>
  <a href="5.php" style="border-right:3px solid black">오늘의 사진</a>
  <a href="4.php">오늘의 끝</a>
   </div>


<h3 class="welcomeword">어서오세요,&nbsp;<u><?php echo htmlspecialchars($_SESSION['username']);?></u>님<br>오늘의 기록을 기다립니다!</h3> <!-- 어서오세요, 누구 님 오늘의 기록을 기다립니<-->

<img src="writing.svg">

<br><br>



<div class="underword">
  <br>
  <strong>나의 하루</strong><br>
<strong>내 안의 감정, 여기에 잠들다</strong>

<hr>
</div>
<p>
</p>

</body>

</html>
