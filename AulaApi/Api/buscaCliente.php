<?php
   if($_SERVER["REQUEST_METHOD"] != "POST"){
        echo "não é um POST";
        die;
    }
    if(!password_verify("teste", $_SERVER["HTTP_TESTEAPI"])){
        echo "Acesso Negado";
        die;
    }

    require_once($_SERVER["DOCUMENT_ROOT"]."/AulaApi/Api/controler/cliente.php");
    use Controler\Cliente;
    // Chama a função de listar clientes do BD e armazena o retorno em um Array
    try{       
        $cliente = new Cliente();
        echo $cliente->buscaCliente($_POST["id"]);
    }catch(Exception $e){
        echo "Erro ao conectar: ".$e->getmessage();
    }finally{
        unset($cliente);
    }