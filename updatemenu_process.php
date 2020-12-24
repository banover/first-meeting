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







// $sql5="SELECT menu_name FROM menus WHERE username='{$_SESSION['username']}'";
// $result5=mysqli_query($link,$sql5);
// $select_form_updatemenu = '<select name="menu_name">';
// while($row=mysqli_fetch_array($result5)){
//   $select_form_updatemenu .='<option value="menu_name">'.$row['menu_name'].'</option>';
//   }
//   $select_form_updatemenu .='</select>';



$sql6="SELECT*FROM menus WHERE menu_name='{$_POST['menu_name']}'";
$result6=mysqli_query($link,$sql6);
$menu_row=mysqli_fetch_array($result6);



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

  <form action="updatemenu_clear.php" method="post" enctype="multipart/form-data">

  <input type="text" name="updatemenu_name" value="<?=$menu_row['menu_name']?>"><br>
  <input type="file" name="menu_image"><br>
  <input type="text" name="menu_description" value="<?=$menu_row['menu_description']?>"><br>
  <?=$select_form?><br>
<input type="hidden" name="menu_name" value="<?=$_POST['menu_name']?>">
  <input type="submit" name="submit" value="등록">
  </form>


</p>









</body>

</html>
