<?php
    // Inclui o arquivo do model
    require_once("./model/cliente.php");
  // Cria uma função de listagem
  function listarCliente(){
      // Chama a função de listar clientes do BD e armazena o retorno em um Array
      return $arrayClientes = listaClientes ();
  }
?>