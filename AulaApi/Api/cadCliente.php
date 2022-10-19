<?php
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        echo "não é POST";
        die;
    }
    if(!password_verify("teste", $_SERVER["HTTP_TESTEAPI"])){
        echo "Acesso Negado";
        die;
    }

    require_once($_SERVER["DOCUMENT_ROOT"]."/AulaApi/Api/controler/cliente.php");
    use Controler\Cliente;

    $dados = json_decode(file_get_contents("php://input"), true);
    // Chama a função de listar clientes do BD e armazena o retorno em um Array
    try{
        $cliente = new Cliente();
        $cliente->__set("nome", $dados["nome"]);
        $cliente->__set("sobrenome", $dados["sobrenome"]);
        $cliente->__set("ddd", $dados["ddd"]);
        $cliente->__set("telefone", $dados["telefone"]);

        //Chama a função de cadastro de cliente e envia o Array
        $cliente->cadCliente();
    }catch(Exception $e){
        echo "Erro ao conectar: ".$e->getmessage();
    }finally{
        unset($cliente);
    }
    
?>