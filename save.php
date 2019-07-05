<?php
include 'work.php';
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];

if ($_SESSION["email"] == $email) {
  $dados = array(
    "nome" => $nome,
    "senha" => $senha
  );
  $key = array(
    'id' => $_SESSION["id_user"]
  );

  sqlUpdate("usuario", $dados, $key);

  $_SESSION["senha"] = $senha;
  $_SESSION["nome_user"] = $nome;
  header("location:content.php?_location=settings&erro=null");
}else {
  if (temEmail($email) == null) {
    $dados = array(
      "nome" => $nome,
      "email" => $email,
      "senha" => $senha
    );
    $key = array(
      'id' => $_SESSION["id_user"]
    );

    sqlUpdate("usuario", $dados, $key);

    $_SESSION["email"] = $email;
    $_SESSION["senha"] = $senha;
    $_SESSION["nome_user"] = $nome;
    header("location:content.php?_location=settings&erro=null");
  }else{
    header("location:content.php?_location=settings&erro=email");
  }
}

 ?>
