<?php

function load_page() {
    //Se o GET não existir atribui o valor "home" para a variável de controle
    isset($_GET["p"])? $page = $_GET["p"]: $page = "home";

    switch($page){
        case "home":
            require_once("./view/listaCliente.php");
        break;
        case "cadastra":
            require_once("./view/cadCLiente.php");
        break;
        case "deletar":
            require_once("./view/deletaCLiente.php");
        break;
        case "alterar":
            require_once("./view/alteraCLiente.php");
        break;
        //Se não for nenhum dos casos carrega a home.
        default:
            require_once("./view/ERRO.php");
        break;
    }
}

?>