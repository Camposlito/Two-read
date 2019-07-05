<?php
include "work.php";

function mainContent(){
  $go = $_GET["_location"];
  switch ($go) {
    case 'login':
      include "login.php";
      break;

    case 'main':
      include "main.php";
      break;

    case 'profile':
      include "profile.php";
      break;

    case 'settings':
      include "settings.php";
      break;

    case 'ler-texto':
      include "ler-texto.php";
      break;

    default:
      //
      break;
  }
}

include "lib/main-template.php";
 ?>
