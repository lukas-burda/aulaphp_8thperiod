<?php
require_once('dbcontext.php');

function create($pessoa)
{
    try {
        if (
            isset($pessoa) && $pessoa['name'] != '' && $pessoa['document'] != ''
            && $pessoa['type'] != ''
        ) {

            $pdo = conn_db();
            $sql = $pdo->prepare("INSERT INTO pessoas VALUES(null, ?, ?, ?)");
            $sql->execute(array_values($pessoa));
            echo "Salvo com sucesso.";
        } else {
            throw new Exception("Preencha todos os campos");
        }
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}


function delete($id)
{
    try {
        if ($id) {
            $id = (int) $_GET['pessoa'];

            $pdo = conn_db();
            $pdo->exec("DELETE FROM PESSOAS WHERE ID =$id");
            echo "Pessoa $id deletada";
        };
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}

function edit($pessoa){
    try {
        var_dump($pessoa);
        if (
            isset($pessoa) && $pessoa['name'] != '' && $pessoa['document'] != ''
            && $pessoa['type'] != ''
        ) {
            $pdo = conn_db();
            $pdo->exec('UPDATE 
        pessoas SET name ="' . $_POST['name'] . '",
        document="' . $_POST['document'] . '",
        type="' . $_POST['type'] . '" 
        WHERE id="' . $_GET['editar'] . '"');
            echo "Alterado com Sucesso!<br>";
        } else{
            throw new Exception("Falta preencher os campos");
        }
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}
