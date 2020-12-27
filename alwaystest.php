<?php
require_once "config.php";
session_start();

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

 ?>


<!-- <!doctype html>
<html>

 <video  controls>
   <source src="videos/63074935967__BB963074-B0F1-42A4-A36D-453385BDA168.MOV" >
 </video>

 </html> -->
