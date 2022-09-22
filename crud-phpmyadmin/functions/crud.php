<?php 
function conn_db(){
    return new PDO("mysql:host=127.0.0.1:3308; dbname=aula-database","root","");
}

function fetchpessoas(){
    $pdo = conn_db();

    $sql = $pdo -> prepare("SELECT * FROM PESSOAS");
    $sql -> execute();
    return $sql -> fetchall();
}

function create($pessoa){
    $pdo = conn_db();
    $sql = $pdo -> prepare("INSERT INTO pessoas VALUES(null, ?, ?, ?, '".date("m/d/Y h:i:s", time())."')");
    $sql -> execute(array_values($pessoa));    
}


function delete($id){
    if($id){
        $id = (int) $_GET['delete'];
        
        $pdo = conn_db();
        $pdo -> exec("DELETE FROM PESSOAS WHERE ID =$id");
        echo "Pessoa $id deletada";
    };
}

function edit($pessoa){
    if(isset($pessoa)){
        $pdo = conn_db();
        $pdo -> exec('UPDATE 
        pessoas SET name ="'.$_POST['name'].'",
        document="'.$_POST['document'].'",
        type="'.$_POST['type'].'" 
        WHERE id="'.$_GET['editar'].'"');
        echo "Alterado com Sucesso!<br>";
    }
}

?>