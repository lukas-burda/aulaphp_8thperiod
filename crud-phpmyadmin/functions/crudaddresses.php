<?php
require_once('dbcontext.php');

function create($address)
{
    try {
        if (isset($address) && $address['cep'] != '' && $address['number'] != ''
        ) {
            $pdo = conn_db();
            $sql = $pdo->prepare("INSERT INTO addresses VALUES(null, ?, ?)");
            $sql->execute(array_values($address));
        }
        else{
            throw new Exception("<p> Preencha todos os campos </p>");
        }
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}

function delete($id)
{
    try {
        if ($id) {
            $id = (int) $_GET['delete'];

            $pdo = conn_db();
            $pdo->exec("DELETE FROM addresses WHERE ID =$id");
            echo "Endereço $id deletado";
        };
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}

function edit($address)
{
    try {
        if (isset($address) && $address['cep'] != '' && $address['number'] != '') {
            $pdo = conn_db();
            $pdo->exec('UPDATE 
        addresses SET cep ="' . $_POST['cep'] . '",
        number="' . $_POST['number'] . '" 
        WHERE id="' . $_GET['editar'] . '"');
            echo "Alterado com Sucesso!<br>";
        }
        else{
            throw new Exception ("Preencha os campos");
        }
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}
