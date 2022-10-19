<?php
namespace Controlers;
class Controler{
    public static function view($view, $dados = []){
        require_once("view/$view.php");
    }
}
