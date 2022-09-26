<?php
    // Inclui o arquivo do model
    require_once("../model/cliente.php");
    // Recebe os dados por POST e adiciona em um Array
    if (isset($_POST["nome"])){
        $arrayCliente = array (
            "nome" => $_POST["nome"],
            "sobrenome" => $_POST["sobrenome"],
            "ddd" => $_POST["ddd"],
            "telefone" => $_POST["telefone"],
        );
        //Chama a função de cadastro de cliente e envia o Array
        echo cadCliente($arrayCliente);
        //retorna um botão de voltar pra Home
        echo '<a href="../index.php">Voltar<a/>';
    }else{
       reader("Location:../index.php");
    }
?>
