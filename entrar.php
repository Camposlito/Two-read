<?php
include "work.php";
session_start();
$email = $_POST["email"];
$senha = $_POST["senha"];

$id = temEmail($email);

if ($id == null) {
  header("location:content.php?_location=login&erro=email");
}else {
  if (confirmarSenha($senha, $id) == false) {
    header("location:content.php?_location=login&erro=senha");
  }else{
    $_SESSION['status'] = true;
    $_SESSION["email"] = $email;
    $_SESSION["id_user"] = getIdUser($email);
    $_SESSION["senha"] = $senha;
    $_SESSION["nome_user"] = getNome($email);
    header("location:content.php?_location=profile");
  }
}

 ?>
