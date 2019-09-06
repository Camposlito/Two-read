<?php
include "work.php";
require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;

$id_txt = $_POST["id_txt"];
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

savetxt($nome, $txt, $result, $id_txt);

header("location:content.php?_location=profile");
 ?>
