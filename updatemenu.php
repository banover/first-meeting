<?php
require_once "config.php";
session_start();

$sql = "SELECT*FROM menu WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($link,$sql);
$menu = "";
 while($menulist=mysqli_fetch_array($result)){
  $menu = '<a href="1.php?id='.$menulist['id'].'"style="border-right:3px solid black">'.$menulist['menuname'].'</a>';
}






$createmenu = '<a href="createmenu.php">메뉴 등록</a>';
$updatemenu = '<a href="updatemenu.php">메뉴 수정</a>';
$deletemenu = '<a href="deletemenu.php">메뉴 삭제</a>';


 ?>



<!doctype html>
<html>

<head>
 <title>그림자</title>
 <meta charset="UTF-8">
 <link rel='stylesheet' type='text/css' href='style.php' />
</head>

<body>
  <h1><a href="index.php">Soo's Container</a></h1>
 <div class="grid">
   <?=$menu?>
<a href="1.php" style="border-right:3px solid black">오늘의 시작</a>
  <a href="2.php" style="border-right:3px solid black">오늘의 만남</a>
  <a href="3.php" style="border-right:3px solid black">오늘의 코드</a>
  <a href="5.php" style="border-right:3px solid black">오늘의 사진</a>
  <a href="4.php">오늘의 끝</a>
 </div>
 <?=$createmenu?>
 <?=$updatemenu?>
 <?=$deletemenu?>


<p>
<from action="tft.php" method="post">
<input type="text" name="menuname" placeholder="<등록할 메뉴 이름을 입력해주세요">
<input type="submit" name="submit" value="등록">
</p>




<h3>환영합니다</h3>
<img src="traffic-sign.svg">

<br><br>
<form action="login.php" method="post">
  <div class="login">
  <label for="uname"><b>이 름</b></label><br>
  <input class="box" type="text" placeholder="이름" id="uname" name="username" required>
   <br><br>
  <label for="psw"><b>비밀번호</b></label><br>
  <input class="box" type="password" placeholder="비밀번호" id="psw" name="password" required>
   <br><br>

   <div id="but">

   <button onclick="document.getElementById('id010').style.display='block'" >등 록</button>
   <button type="submit">입 장</button>

   </div>
   </div>
   </form>

   <div id="id010" class="modal">

 <form class="modal-content" action="register.php" method="post">
   <div class="container">
     <span onclick="document.getElementById('id010').style.display='none'">x</span>
        <h5>등 록</h5>
        <div class="inerbox">

          <input type="text" placeholder="이름" name="username" required>
          <br><br>

          <input type="password" placeholder="비밀번호" name="password" required>
<input type="password" name="confirm_password" placeholder="비밀번호 확인" required>
</div>
          <p>*반드시 기억해주세요*</p>
          <hr>
<div class="inerbut">
        <button onclick="document.getElementById('id010').style.display='none'">닫기</button>
        <button type="submit">등록 완료</button>
      </div>







</div>

</form>

</div>





<script>
  var modal = document.getElementById('id010');
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

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
