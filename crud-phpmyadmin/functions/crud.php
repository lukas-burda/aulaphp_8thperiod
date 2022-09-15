<?php 
function connect_db(){
    return new PDO("mysql:host=127.0.0.1:3308; dbname=aula-database","root","");
}

function fetchpessoas(){
    $pdo = connect_db();

    $sql = $pdo -> prepare("SELECT * FROM PESSOAS");
    $sql -> execute();
    return $sql -> fetchall();
}

function create($pessoa){
    $pdo = connect_db();
    $sql = $pdo -> prepare("INSERT INTO pessoas VALUES(null, ?, ?, ?, '2022-09-05 20:30:00')");
    $sql -> execute(array_values($pessoa));    
}


function delete($id){
    if($id){
        $id = (int) $_GET['delete'];
        
        $pdo = connect_db();
        $pdo -> exec("DELETE FROM PESSOAS WHERE ID =$id");
        echo "Cliente $id deletado";
    };
}

function edit($pessoa){
    if(isset($pessoa)){
        $pdo = connect_db();
        $pdo -> exec('UPDATE 
        pessoas SET name ="'.$_POST['name'].'",
        document="'.$_POST['document'].'",
        type="'.$_POST['type'].'" 
        WHERE id="'.$_GET['editar'].'"');
        echo "Alterado com Sucesso!<br>";
    }
}

?>