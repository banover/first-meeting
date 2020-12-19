<?php
require_once "config.php";
session_start();


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])){
  if(isset($_POST['date'])){

    $sql = "SELECT id FROM image WHERE username =? AND date = ?";
      if($stmt = mysqli_prepare($link,$sql)){
       mysqli_stmt_bind_param($stmt,"ss", $param_username,$param_date);
        $param_username = $_SESSION['username'];
        $param_date = $_POST['date'];

       if(mysqli_stmt_execute($stmt)){
           mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt) == 1){
             echo "이미 글이 등록된 날짜입니다"; // 경고창 뜨는걸로 수정하기
             header('location:uploading.php');
    } else{

  $target_dir = "images/";
  $filename = basename($_FILES["fileToUpload"]["name"]);
  $target_file_path = $target_dir . $filename;
  $imagefile_savename = $_POST['date'];
  $imageFileType = strtolower(pathinfo($target_file_path,PATHINFO_EXTENSION));
  $allowimageFileType = array("jpg","jpeg","png","gif");

    if(in_array($imageFileType, $allowimageFileType)){
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"images/".$imagefile_savename);
      $sql = "INSERT INTO image (username, date, image) VALUES(?,?,?)";
      if($stmt=mysqli_prepare($link,$sql)){
        mysqli_stmt_bind_param($stmt,"sss",$param_username,$param_date,$param_image);
        $param_username = $_SESSION['username'];
        $param_date = $_POST['date'];
        $param_image = $imagefile_savename;
        if(mysqli_stmt_execute($stmt)){
          header('location:5.php');

        }
      }
    }
  }
}
}
}
}

    //  file_put_contents($target_dir)


////////////////////////
//
//       if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_path)){
//         $sql = "INSERT INTO image (username, date, image) VALUES(?, ?, ?)"; //image에는 이름만
//         if($stmt = mysqli_prepare($link,$sql)){
//           mysqli_stmt_bind_param($stmt,"sss", $param_username, $param_date, $param_image);
//           $param_username = $_SESSION['username'];
//           $param_date = $_POST['date'];
//           $param_image = $filename;
//            if(mysqli_stmt_execute($stmt)){
//              echo"gg";
//            }else{
//              echo"gg";
//            }
//       }
//     }
//   }
// }

// 서버에 image폴더에 실제파일 저장하고 DB에는 이미지이름을 저장해서 read할때 이름불러와서 서버 image폴더에 있는 파일내용을 불러와서 웹에 보이게 하는거!

          //
  //         mysqli_stmt_store_result($stmt);
  //
  //         header('location:5.php');
  //       } else{
  //         echo"execute오 ";
  //       }
  //     }else{
  //       echo"prepare오류";
  //     }
  //   } else{
  //     echo"in array 오류";
  //   }
  //
  //
  //
  //
  // } else {
  //   echo "isset오''"; //$uploadOk는 나중에 파이클 크기, already exist, file format 제한할 때  활
  //
  // }






// images폴더 밑에 파일명'date'으로 업로드 파일 저정하게 하기


 // 'images폴더 밑에 파일이 있으면 '으로 수정
  //$info = pathinfo($_FILES['fileToUpload']['name']);
  //$ext = $info['extension'];



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
