<?php
$email = $_POST["email"];

if (temEmail($email) == null) {
  
  header("location:content.php?_location=login&erro=null");
}else {
  header("location:content.php?_location=forgot-pass&erro=email");
}

 ?>
