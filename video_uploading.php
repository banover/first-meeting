<?php
require_once "config.php";
session_start();

// 위로는 함수
////////////////////////////////////////////////////////////////////////////////////////

$sql = "SELECT id, menu_name FROM menus WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($link,$sql);
$menu = "";
 while($menulist=mysqli_fetch_array($result)){
  $menu .= '<a href="realindex.php?id='.$menulist['id'].'"style="border-right:3px solid black">'.$menulist['menu_name'].'</a>';
}


$createmenu = '<a href="createmenu.php">메뉴 등록</a>';
$updatemenu = '<a href="updatemenu.php">메뉴 수정</a>';
$deletemenu = '<a href="deletemenu.php">메뉴 삭제</a>';



if(isset($_GET['id'])){
$sql2="SELECT*FROM menus WHERE id= '{$_GET['id']}'";
$result2=mysqli_query($link,$sql2);
$row=mysqli_fetch_array($result2);
$title = $row['menu_name'];
$menu_image_output = '<img src="menuimages/'.$row['menu_image'].'">';
$menu_description_output = $row['menu_description'];
 $record_type = "";
 //////////////////////////////////////////////////////////////////한 줄 글 기<
 if($row['record_type'] == "한 줄 글 출력기능"){
   function image_uploading(){echo "";}
   function image_updating(){echo "";}
   function image_deleting(){echo "";}
   function image_reading(){echo "";}
   function video_uploading(){echo "";}
   function video_updating(){echo "";}
   function video_deleting(){echo "";}

   function writing(){
    echo '<a href="writing.php?id='.$_GET['id'].'">기록하기</a>';
   }


   function updating(){
    global $link;
    $sql = "SELECT id FROM oneline_record WHERE author=?";
    if($stmt = mysqli_prepare($link,$sql)){
      mysqli_stmt_bind_param($stmt, "s", $param_author);
      $param_author = $_SESSION['username'];
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)>0){
          echo '<a href="correct.php?id='.$_GET['id'].'">수정하기</a>';
        }else{
          echo"";
        }
        }else{
          echo"execute오류";
        }

        }else{
          echo"prepare오류";
        }
   }


   function deleting(){
     global $link;
    $sql2 = "SELECT id FROM oneline_record WHERE author=?";
    if($stmt = mysqli_prepare($link,$sql2)){
      mysqli_stmt_bind_param($stmt, "s", $param_author);
      $param_author = $_SESSION['username'];
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)>0){
          echo '<a href="delete.php?id='.$_GET['id'].'">삭제하기</a>';
        }else{
          echo"";
        }
        }else{
          echo"execute오류";
        }

        }else{
          echo"prepare오류";
        }
        }


        function reading(){
          global $link;
          $sql= "SELECT date, description FROM oneline_record WHERE author =?";
           if($stmt=mysqli_prepare($link,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$param_author);
           $param_author = $_SESSION['username'];
             if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) > 0){
                   mysqli_stmt_bind_result($stmt,$date,$description);

                   while(mysqli_stmt_fetch($stmt)){
                     echo"<li><strong>";
                     printf ("[%s]&nbsp;&nbsp; %s \n", $date, $description);
                     echo"</strong></li>";
                   }
          }else{

          echo"";
          }
        } else{
          echo"execute오류";
        }
        } else{
          echo"prepare오류";
        }
        }


} else {
function writing(){ echo "";}
function updating(){ echo "";}
function deleting(){ echo "";}
function reading(){ echo "";}

//////////////////////////////////////////////////////////이미지 첨부기능
if($row['record_type'] == "이미지 첨부기능"){

  function video_uploading(){echo "";}
  function video_updating(){echo "";}
  function video_deleting(){echo "";}
  function video_reading(){echo "";}

  function image_uploading(){
   echo '<a href="uploading.php?id='.$_GET['id'].'">등록하기</a>';
  }

  function image_updating(){
  $oneline = scandir('./images');
  if (count($oneline)>=3){

  echo '<a href="correctpicture.php?id='.$_GET['id'].'">수정하기</a>';
  }
}

  function image_deleting(){
  $oneline = scandir('./images');
  if (count($oneline)>=3){
    echo '<a href="deletepicture.php?id='.$_GET['id'].'">삭제하기</a>';
  }
}


    function image_reading(){
    global $link;
    $sql = "SELECT date, image FROM image WHERE username=? ";
    $username = $_SESSION['username'];
    if($stmt = mysqli_prepare($link,$sql)){
      mysqli_stmt_bind_param($stmt,"s",$param_username);
      $param_username = $username;
      if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);

           if(mysqli_stmt_num_rows($stmt) > 0){

                mysqli_stmt_bind_result($stmt, $date, $image);

               while(mysqli_stmt_fetch($stmt)){
                  echo "<ul>";
                  echo "<li><strong>".$date."</strong></li>";
                  echo "<img src=images/".$image." height=200 width=300/>";
                  echo "</ul>";
               }
            }
          }
        }
      }
} else{

  function image_uploading(){echo "";}
  function image_updating(){echo "";}
  function image_deleting(){echo "";}
  function image_reading(){echo "";}
/////////////////////////////////////////////////////////////////////////동영상 첨부기능
if($row['record_type'] == "동영상 첨부기능"){

  function video_uploading(){
    echo '<a href=video_uploading.php?id='.$_GET['id'].'>등록하기</a>';
    }

    function video_updating(){
      $videos = scandir('./videos');
      if(count($videos)>=3){
      echo '<a href=video_updating_date.php?id='.$_GET['id'].'>수정하기</a>';
      }
    }

    function video_deleting(){
      $videos = scandir('./videos');
      if(count($videos)>=3){
    echo'<a href=video_deleting.php?id='.$_GET['id'].'>삭제하기</a>';
    }
  }

  function video_reading(){
  global $link;
  $sql = "SELECT*FROM videos WHERE username = '{$_SESSION['username']}' ";
  $result = mysqli_query($link,$sql);
  while($row= mysqli_fetch_assoc($result)){

  echo "<ul>";
  echo "<li><strong>".$row['date']."</strong></li>";
  echo "<video controls>";
  echo "<source src=".$row['video_location'].">";
  echo "</video>";
  echo "</ul>";

  }
  }




} else{
  function video_uploading(){echo "";}
  function video_updating(){echo "";}
  function video_deleting(){echo "";}
  function video_reading(){echo "";}
}





}
}


}else{
  echo"";
  $title="기록을 관리해주세요";
  $menu_image_output='<img src="document.svg">';
  $menu_description_output="
<strong>메뉴를 등록 또는 선택해주세요</strong>";
  function writing(){ echo "";}
  function updating(){ echo "";}
  function deleting(){ echo "";}
  function reading(){ echo "";}
  function image_uploading(){echo "";}
  function image_updating(){echo "";}
  function image_deleting(){echo "";}
  function image_reading(){echo "";}
  function video_uploading(){echo "";}
  function video_updating(){echo "";}
  function video_deleting(){echo "";}
  function video_reading(){echo "";}
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
  <h1><a href="index.php">Soo's Container</a></h1>
 <div class="grid">
   <?=$menu?>

 </div>
 <?=$createmenu?>
 <?=$updatemenu?>
 <?=$deletemenu?>


<!--

-->


<br>



<br>



<h3><?= $title?></h3>
<?=$menu_image_output?>








<div class="underword">
  <br><br>
<strong><?=$menu_description_output?></strong>
</div>
<hr class="uline">
<div class="smallmenu">
<?php writing();?>
<?php updating();?>
<?php deleting();?>
<?php image_uploading();?>
<?php image_updating();?>
<?php image_deleting();?>
 <?php video_uploading();?>
 <?php video_updating();?>
 <?php video_deleting();?>

</div>
<hr class="uline">

<div class="picon">
<form action="video_uploading_process.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
<input type="date" name="date">
<input type="file" name="video_name">
<input type="submit" name="video_upload" value="등록">
</form>
</div>







<div class="oneline">
<?php reading();?>
</div>
<div class="picposition">
<?php image_reading();?>
</div>
<div class="videoposition">
  <?php video_reading()?>
</div>
</body>

</html>
