<?php
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
  //  echo "File is an image - " . $check["mime"] . "."; //header써서 5.php로 이동
    $uploadOk = 1; //파일 확장자가 이미지인지 꼭 echo로 표현해야하나? 없애도..
  } else {
    echo "File is not an image."; //$uploadOk는 나중에 파이클 크기, already exist, file format 제한할 때  활
    $uploadOk = 0;
  }
}

// images폴더 밑에 파일명'date'으로 업로드 파일 저정하게 하기


if(isset($_POST["submit"])){ // 'images폴더 밑에 파일이 있으면 '으로 수정
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
