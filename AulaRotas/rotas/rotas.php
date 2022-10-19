<?php

function load($controler, $metodo){
    $classeControler = "Controlers\\$controler";
    if(!class_exists($classeControler)){
        echo "Controler não Existe";
        die;
    }
    $classe = new $classeControler;

    if(!method_exists($classe, $metodo)){
        echo "Controler não Existe";
        die;
    }
    $classe->$metodo();

}

$rotas = array(
    "GET" => array(
        "" => fn()=>load("Home", "index"),
        "contato" => fn()=> load("Contato", "index"),
    ),
    "POST" => array(
        "/" => "home",
        "/contato" => fn()=> load("Contato", "index"),
    ),
);