<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/cliente.php");
    use Model\Cliente;
    // Chama a função de listar clientes do BD e armazena o retorno em um Array

    if (isset($_GET["del"])){
        //Chama a função de deletar e envia o ID, a função retorna uma string
        $cliente = new Cliente();
        $cliente->deletaCliente($_GET["del"]);
    }

    header("location: ./index.php");
?>
<br>
<!-- Cria um botão para voltar para a home -->
<a href="./?p=home">Voltar</a>
