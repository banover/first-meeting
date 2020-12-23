<?php

require_once "config.php";
session_start();

$sql = "INSERT INTO menus (username,menu_name,menu_image,menu_description,record_type)
 VALUES ('{$_SESSION['username']}','{$_POST['menu_name']}','{$_FILES["menu_image"]["name"]}','{$_POST['menu_description']}','{$_POST['record_type']}')";
if($result = mysqli_query($link,$sql)){
  $imagefile_name= $_FILES["menu_image"]["name"];


  move_uploaded_file($_FILES["menu_image"]["tmp_name"],"menuimages/".$imagefile_name);
  header('location:realindex.php');

} else{
  echo"query오";
}




 ?>
