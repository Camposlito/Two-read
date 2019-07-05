<?php
include 'work.php';
$id_txt = $_POST["idDelete"];

apagarTexto($id_txt);
header("location:content.php?_location=profile");
 ?>
