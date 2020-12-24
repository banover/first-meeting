<?php
require_once "config.php";
session_start();


// images폴더 밑에 파일명'date'으로 업로드 파일 저정하게 하기


if(isset($_POST["submit"])){
  $sql = "UPDATE image SET image = ? WHERE username =?";
  $imagefile_savename = $_POST['date'];
  if($stmt=mysqli_prepare($link,$sql)){
    mysqli_stmt_bind_param($stmt,"ss",$param_image,$param_username);
    $param_image = $imagefile_savename;
    $param_username = $_SESSION['username'];
    if(mysqli_stmt_execute($stmt)){
      $savename =  $_POST['date'];//.".".$ext;
      $target = 'images/'.$savename;
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target);
      header('location:realindex.php?id='.$_GET['id'].'');
    } else{
      echo"execute";
    }

  } else{
    echo"prepare오 ";
  }
} else{
 echo"gg";
}








/*$onepicture = scandir('./images');
$i = 0;

while ($i<count($onepicture)){
  if($onepicture[$i] != '.'){
    if($onepicture[$i] != '..'){
echo "<ul>";
echo "<li><strong>";
echo $onepicture[$i];
echo "</strong></li>";
echo "</ul>";
echo "&nbsp;&nbsp";
echo "<img src=".$target." height=200 width=300/>";
echo '<br>';


}
}
$i=$i+1;
}
*/

?>
