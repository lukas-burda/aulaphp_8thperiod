<?php

const _PAGE = "./pages/aula_";

function load_page(){
    isset($_GET['p']) ? $page = $_GET['p'] : $page = 'home';

    if(file_exists(_PAGE."$page.php") ){
      (strripos($page , "/") OR strripos($page , "%"))? require_once(_PAGE."error404.php"):require_once(_PAGE."$page.php");
      } else {
        require_once(_PAGE."error404.php");
    }

}

function load_titulos(){
  isset($_GET['p']) ? $page = $_GET['p'] : $page = "home";

  switch($page){
    case "home":
      echo "Titulo da Home";
    break;
    case "sobreNos":
      echo "Titulo do Sobre nós";
    break;
    case "contato":
      echo "Titulo do Contato";
    break;
    default:
      echo "Erro 404";
    break;

  }

}


?>