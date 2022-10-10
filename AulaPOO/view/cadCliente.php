<br><br>
<!-- O action envia por POST o forma para o controlador -->
<form method="post">
    <label>Nome:</label>
    <input type="text" name="nome" ><br>
    <label>Sobreome:</label>
    <input type="text" name="sobrenome" ><br>
    <label>DDD:</label>
    <input type="text" name="ddd"><br>
    <label>Telefone:</label>
    <input type="text" name="telefone"><br>
    <input type="submit" value="Salvar"><br>
</form>
<?php
    require_once("./controler/cliente.php");
    use Controler\Cliente;
    // Chama a função de listar clientes do BD e armazena o retorno em um Array

    $cliente = new Cliente();
    if (isset($_POST["nome"])){
        $cliente->__set("nome", $_POST["nome"]);
        $cliente->__set("sobrenome", $_POST["sobrenome"]);
        $cliente->__set("ddd", $_POST["ddd"]);
        $cliente->__set("telefone", $_POST["telefone"]);

        //Chama a função de cadastro de cliente e envia o Array
        $cliente->cadCliente();
        //retorna um botão de voltar pra Home
        echo '<a href="./index.php">Voltar<a/>';
        header("location: ./index.php");
    }
?>