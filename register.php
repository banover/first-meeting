<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

//유저이름 중복확인 및 등록
if(empty(trim($_POST["username"]))){
  $username_err = "이름을 입력해 주세요";
}  else{
  $sql = "SELECT id FROM userdata WHERE username = ?"; //?있었는 $username?

  if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = trim($_POST["username"]);

    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt) == 1){
        $username_err = "이미 있는 이름입니다";
      } else{
        $username = trim($_POST["username"]);
      }
    } else {
      echo "문제발생, 재시도 해주세요";
    }
    mysqli_stmt_close($stmt);
  }
}

//비밀번호 중복 확인 및 등록

if(empty(trim($_POST["password"]))){
 $password_err ="비밀번호를 입력해 주세요";
} elseif(strlen(trim($_POST["password"]))<6){
  $password_err="비밀번호는 최소 6자리 이상입니다";
} else{
  $password = trim($_POST["password"]);
}

//비밀번호 확인

if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "비밀번호를 입력해 주세요";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "비밀번호가 일치하지 않습니다";
        }
    }

//DB에 집어넣기 전 마지막 점검
if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
$sql = "INSERT INTO userdata (username, password) VALUES(?, ?)";
if($stmt=mysqli_prepare($link,$sql)){
mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_password);

$param_username = $username;
$param_password = password_hash($password, PASSWORD_DEFAULT);

if(mysqli_stmt_execute($stmt)){

 header('location:/index.php');
} else {
  echo "오류발생";
}

  mysqli_stmt_close($stmt);
}
}
mysqli_close($link);

}

?>
