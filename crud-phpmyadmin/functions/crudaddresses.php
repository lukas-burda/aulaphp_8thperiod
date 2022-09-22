<?php 
require_once('dbcontext.php');

function create($address){
    $pdo = conn_db();
    $sql = $pdo -> prepare("INSERT INTO addresses VALUES(null, ?, ?, '".date("m/d/Y h:i:s", time())."')");
    $sql -> execute(array_values($address));    
}

function delete($id){
    if($id){
        $id = (int) $_GET['delete'];
        
        $pdo = conn_db();
        $pdo -> exec("DELETE FROM addresses WHERE ID =$id");
        echo "Endereço $id deletado";
    };
}

function edit($address){
    if(isset($address)){
        $pdo = conn_db();
        $pdo -> exec('UPDATE 
        addresses SET cep ="'.$_POST['cep'].'",
        number="'.$_POST['number'].'" 
        WHERE id="'.$_GET['editar'].'"');
        echo "Alterado com Sucesso!<br>";
    }
}
