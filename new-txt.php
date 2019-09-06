<?php
include "work.php";
require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

$id_user = $_POST["id_user"];
$nome = $_POST["nome"];
$txt = $_POST["txt"];

if ($_POST["lang"] == "en") {
  $source = 'pt-br';
  $target = 'en';
}else{
  $source = 'en';
  $target = 'pt-br';
}

$trans = new GoogleTranslate();
$result = $trans->translate($source, $target, $txt);

novotxt($nome, $txt, $id_user, $result);
header("location:content.php?_location=profile");
 ?>
