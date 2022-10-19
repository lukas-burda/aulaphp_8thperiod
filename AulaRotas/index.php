<?php
require_once("./controler/contato.php");
require_once("./controler/controler.php");
require_once("./controler/home.php");
require_once("./rotas/rotas.php");


$uri  = parse_url($_SERVER["REQUEST_URI"])["path"];
$req = $_SERVER["REQUEST_METHOD"];
$uri = str_replace("/AulaRotas","",$uri);
$uri = str_replace("/","",$uri);

if(!isset($rotas[$req])){
    echo "Rota não existe";
    die;
}

if(!array_key_exists($uri, $rotas[$req])){
    echo "Rota não existe";
    die;

}
$load = $rotas[$req][$uri];
$load();
