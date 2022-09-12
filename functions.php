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




?>