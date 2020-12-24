<?php
require_once "config.php";
session_start();

$sql="UPDATE menus SET username='{$_SESSION['username']}', menu_name='{$_POST['updatemenu_name']}', menu_image='{$_FILES['menu_image']['name']}', menu_description='{$_POST['menu_description']}', record_type='{$_POST['record_type']}' WHERE username ='{$_SESSION['username']}' AND menu_name ='{$_POST['menu_name']}'";
if($result=mysqli_query($link,$sql)){
   header('location:realindex.php');
   move_uploaded_file($_FILES["menu_image"]["tmp_name"],'menuimages/'.$_FILES["menu_image"]["name"]);
} else{
  echo"";
}


 ?>
