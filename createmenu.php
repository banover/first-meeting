<?php
require_once "config.php";
session_start();

$sql = "SELECT id, menu_name FROM menus WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($link,$sql);
$menu = "";
 while($menulist=mysqli_fetch_array($result)){
  $menu .= '<a href="1.php?id='.$menulist['id'].'"style="border-right:3px solid black">'.$menulist['menu_name'].'</a>';
}



$createmenu = '<a href="createmenu.php">메뉴 등록</a>';
$updatemenu = '<a href="updatemenu.php">메뉴 수정</a>'; //만약 등록된 메뉴가 있으면 수정,삭제 출력하<
$deletemenu = '<a href="deletemenu.php">메뉴 삭제</a>';


$sql4= "SELECT*FROM record_type";
$result4= mysqli_query($link,$sql4);
$select_form = '<select name="record_type">';
while($row=mysqli_fetch_array($result4)){
  $select_form .= '<option value="'.$row['record_type'].'">'.$row['record_type'].'</option>';
}
$select_form .= '</select>';


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

 </div>
 <?=$createmenu?>
 <?=$updatemenu?>
 <?=$deletemenu?>


<p>
<form action="createmenu_process.php" method="post" enctype="multipart/form-data">
<input type="text" name="menu_name" placeholder="메뉴 이름을 입력해주세요"><br>
<input type="file" name="menu_image"><br>
<input type-="text" name="menu_description"placeholder="메뉴를 설명해주세요"><br>
<?=$select_form?><br>
<input type="submit" name="submit" value="등록">
</form>
</p>









</body>

</html>
