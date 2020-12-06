<?php
file_put_contents('data/'.$_POST['date'], $_POST['description']);
header('Location:/1.php');
 ?>
