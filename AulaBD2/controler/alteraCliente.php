<?php
    // Inclui o arquivo do model
    require_once("./model/cliente.php");
    // Cria uma função para buscar o cliente que será alterado 
    function alterarClientes($id){
        //Busca no Banco de dados o Cliente para ser alterado
        if(is_int($id)){
        return buscaCliente ($id);
        }else{
            throw new Exception("Não é um inteiro");
        }
  
    }

    // Cria uma função para alterar o cliente 
    function alterarCli($cliente){
        // Altera o cliente no Banco de dados
        return alteraCliente($cliente);
    }
?>
