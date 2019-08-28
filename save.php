<?php
include 'work.php';
session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];
$nome = $_POST["nome"];

$nova_senha = $_POST["nova-senha"];
$r_nova_senha = $_POST["r-nova-senha"];

if ($_SESSION["senha"] == $nova_senha) {
  if ($_SESSION["email"] == $email) {
    $dados = array(
      "nome" => $nome
    );
    $key = array(
      'id' => $_SESSION["id_user"]
    );

    sqlUpdate("usuario", $dados, $key);

    $_SESSION["nome_user"] = $nome;
    header("location:content.php?_location=settings&erro=null");
  }else {
    if ($_SESSION["senha"] == $senha) {
      if (temEmail($email) == null) {
        $dados = array(
          "email" => $email
        );
        $key = array(
          'id' => $_SESSION["id_user"]
        );

        sqlUpdate("usuario", $dados, $key);

        $_SESSION["email"] = $email;
        header("location:content.php?_location=settings&erro=null");
      }else {
        header("location:content.php?_location=settings&erro=email");
      }
    }else{
      header("location:content.php?_location=settings&erro=senha");
    }
  }
}else{
  if ($nova_senha == $r_nova_senha) {
    if ($_SESSION["senha"] == $senha) {
      $dados = array(
        "senha" => $senha
      );
      $key = array(
        'id' => $_SESSION["id_user"]
      );

      sqlUpdate("usuario", $dados, $key);

      $_SESSION["senha"] = $senha;
      header("location:content.php?_location=settings&erro=null");
    }else {
      header("location:content.php?_location=settings&erro=senha");
    }
  }else{
    header("location:content.php?_location=settings&erro=senha");
  }
}

 ?>
