<?php
include "work.php";
session_start();
$email = $_POST["email"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];

if (temEmail($email) !== null) {
  header("location:content.php?_location=login&erro=cadastro");
}else{
  $dados = array(
    "nome" => $nome,
    "email" => $email,
    "senha" => $senha
  );
  sqlInsert("usuario",$dados);
  $_SESSION['status'] = true;
  $_SESSION["email"] = $email;
  $_SESSION["id_user"] = getIdUser($email);
  $_SESSION["senha"] = $senha;
  $_SESSION["nome_user"] = $nome;
  header("location:content.php?_location=profile");
}


 ?>
