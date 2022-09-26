<?php
    // Inclui o arquivo do model
    require_once("./model/cliente.php");
    // Cria uma função de deletar cliente
    function deletaCli($id){
        //chama a função de deletar do BD
       return deletaCliente($id);
    }
?>