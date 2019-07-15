<?php
include "lib/fw.php";
function pageTitle(){
  echo "Two Read";
}
function navbar(){
  include 'nav-bar.php';
}
function loginProfile($status){
  if ($status == true) {
    echo '<li class="dropdown">';
    echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
    echo '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" style="font-size: 20px; margin-right: 7px"></span> ';
    echo '<span class="caret"></span></a>';
    echo '<ul class="dropdown-menu">';
    echo '<li><a href="content.php?_location=main"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> &nbsp; Página inicial</a></li>';
    echo '<li><a href="content.php?_location=profile"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> &nbsp; Meus Textos</a></li>';
    echo '<li><a href="content.php?_location=settings&erro=null"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> &nbsp; Configurações</a></li>';
    echo '<li role="separator" class="divider"></li>';
    echo '<li><a href="index.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> &nbsp; Sair</a></li> </ul> </li>';
  }else{
    echo '<li id="navcon"><a href="content.php?_location=login&erro=null"><span class="glyphicon glyphicon-log-in" aria-hidden="true" style="font-size: 20px; margin-right: 7px"></span> Entrar</a></li>';
  }
}
function random_color(){
  $letters = '0123456789ABCDEF';
  $color = '#';
  for($i = 0; $i < 6; $i++) {
      $index = rand(0,15);
      $color .= $letters[$index];
  }
  echo $color;
}
function temEmail($email){
  try{
      $sql = "SELECT * FROM usuario";
      $conn = getConnection();
      $resultado = $conn->query($sql);
      if($resultado !== false) {
          foreach($resultado as $row) {
              if ($row["email"] == $email) {
                return $row["id"];
                die();
              }
          }
          return null;
      }
      $conn = null;
  }
  catch(PDOException $e) {
      echo $e->getMessage();
  }
}
function confirmarSenha($senha, $id){
  $dado = array (
    "id" => $id
  );
  $row = sqlSelectFirst("usuario", $dado);
  if($row["senha"] == $senha){
    return true;
    }else{
      return false;
  }
}
function getNome($email){
  $dado = array (
    "email" => $email
  );
  $row = sqlSelectFirst("usuario", $dado);
  return $row["nome"];
}
function getIdUser($email){
  $dado = array (
    "email" => $email
  );
  $row = sqlSelectFirst("usuario", $dado);
  return $row["id"];
}
function divTextos($id_user){
  $sql = "SELECT * FROM textos WHERE id_user = '$id_user'";
  $conn = getConnection();
  $resultado = $conn->query($sql);
  if ($resultado !== false) {
    foreach ($resultado as $row) {
      echo '    <div class="txt"> ';
      echo '      <form action="content.php?_location=ler-texto" method="post"> ';
      echo '        <input type="hidden" id="id_txt" name="id_txt" value="';
      echo $row["id_txt"];
      echo '"> ';
      echo '        <button type="submit" class="namebox"> ';
      echo '          <div class="txtimg" style="background-color: ';
      echo random_color();
      echo '"></div> ';
      echo $row["nome_txt"];
      echo '        </button> ';
      echo '      </form> ';
      echo '      <button data-target=".delete" data-toggle="modal" type="button" class="btn-danger lixeira" onclick="apagar(';
      echo $row["id_txt"];
      echo ')"><span class="glyphicon glyphicon-trash"></span></button> ';
      echo '    </div> ';
    }
  }
  $conn = null;
}
function novotxt($nome_txt, $txt, $id_user, $result){
  $dados = array(
    "txt" => $txt,
    "nome_txt" => $nome_txt,
    "id_user" => $id_user,
    "txt_eng" => $result
  );
  sqlInsert("textos", $dados);
}
function savetxt($nome, $txt, $result, $id_txt){
  $dados = array(
    "nome_txt" => $nome,
    "txt" => $txt,
    "txt_eng" => $result
  );
  $key = array(
    "id_txt" => $id_txt
  );
  sqlUpdate("textos", $dados, $key);
}
function apagarTexto($id_txt){
  $sql = "DELETE FROM textos where id_txt = '$id_txt'";
  $conn = getConnection();
  $resultado = $conn->query($sql);
  $conn = null;
}
function btnVerTexto($status){
  if ($status == false) {
    echo 'content.php?_location=login&erro=null';
  }else{
    echo 'content.php?_location=profile';
  }
}
function getNomeTxt($id_txt){
  $dado = array (
    "id_txt" => $id_txt
  );
  $row = sqlSelectFirst("textos", $dado);
  return $row["nome_txt"];
}
function mostrarTxt($id_txt, $lang){
  $dado = array (
    "id_txt" => $id_txt
  );
  $row = sqlSelectFirst("textos", $dado);
  $texto = "ERRO: IDIOMA NÃO ESPECIFICADO";
  if ($lang == "pt") {
    $texto = $row["txt"];
  }
  if ($lang == "en") {
    $texto = $row["txt_eng"];
  }
  return $texto;
}
?>
