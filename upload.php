<?php
require_once "config.php";
session_start();


// Check if image file is a actual image or fake image
if(isset($_POST["date"])&& isset($_POST["fileToUpload"])&& isset($_SESSION['username'])){
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $extensions_array = array("jpg","jpeg","png","gif");

    if(in_array($imageFileType,$extension_array)){
      $username = $_SESSION['username'];
      $date = $_POST["date"];
      $image = $_POST["fileToUpload"];
      $sql = "INSERT INTO image (username,date,image) VALUES(?,?,?)"

      if($stmt=mysqli_prepare($link,$sql)){
        mysqli_stmt_bind_param($stmt,"sss",$param_username,$param_date,$param_image);
        $param_username = $username;
        $param_date = $date;
        $param_image = $image;
        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          header('location:5.php');
        }
      }
    }




  } else {
    echo "File is not an image."; //$uploadOk는 나중에 파이클 크기, already exist, file format 제한할 때  활

  }
}





// images폴더 밑에 파일명'date'으로 업로드 파일 저정하게 하기


 // 'images폴더 밑에 파일이 있으면 '으로 수정
  //$info = pathinfo($_FILES['fileToUpload']['name']);
  //$ext = $info['extension'];
  $savename =  $_POST['date'];//.".".$ext;
  $target = 'images/'.$savename;



if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)){
 echo "";


}
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
header('Location:/5.php');
?>
