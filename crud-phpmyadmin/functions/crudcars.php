<?php
require_once('dbcontext.php');

function create($cars)
{

    try {
        if (
            isset($cars) && $cars['carname'] != '' && $cars['placa'] != ''
        ) {
            $pdo = conn_db();
            $sql = $pdo->prepare("INSERT INTO cars VALUES(null, ?, ?)");
            $sql->execute(array_values($cars));
        } else {
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
            $pdo->exec("DELETE FROM cars WHERE ID =$id");
            echo "Carro $id deletado";
        };
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}

function edit($cars)
{
    try {
        if (isset($cars)&& $cars['carname'] != '' && $cars['placa'] != '') {
            $pdo = conn_db();
            $pdo->exec('UPDATE 
            cars SET carname ="' . $_POST['carname'] . '",
            placa="' . $_POST['placa'] . '" 
            WHERE id="' . $_GET['editar'] . '"');
            echo "Alterado com Sucesso!<br>";
        }
        throw new Exception ("Preencha os campos");
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}
