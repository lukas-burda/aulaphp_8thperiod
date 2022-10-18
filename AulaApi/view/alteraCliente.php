<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/cliente.php");
    use Controler\Cliente;

    $cliente = new Cliente();

    if(isset($_GET["alt"])){
        //Chama a função de alterar o Array e envia o ID, a função retorna um Array
    try{
        $cliente = $cliente->buscaCliente((int)$_GET["alt"]);
    }catch(Exception $e){
        echo $e->getMessage();
    }

    }
    //Se o formulário foi enviado preenche um Array com os novos dados
    if(isset($_POST["id"])) {    
        
        //$cliente->buscaCliente((int)$_GET["alt"]);   
        echo "Dados Anteriores <br>
        Nome: ".$cliente->nome." <br>
        Sobreome: ".$cliente->sobrenome." <br>
        DDD: ".$cliente->ddd." <br>
        Telefone: ".$cliente->telefone." <hr>";
        
        $cliente->id = $_POST["id"];
        $cliente->nome = $_POST["nome"];
        $cliente->sobrenome = $_POST["sobrenome"];
        $cliente->ddd = $_POST["ddd"];
        $cliente->telefone = $_POST["telefone"];
    $confirm = true;
    };

    if(isset($_POST["enviaForm"]) && $_POST["enviaForm"] == "Confirmar"){

        $cli = new Cliente;
        $cli->alteraCliente($cliente);
        header("location: ./index.php");
    }
?>
<form method="post">
<!-- Preenche o value dos campos dos formulários com os dados -->
<input type="hidden" name="id" value="<?= isset($cliente)? $cliente->id : "" ?>">
<table>
    <tr>
        <td><label>Nome:</label></td>
        <td>
            <input type="text" name="nome" value="<?= isset($cliente)? $cliente->nome: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Sobreome:</label></td>
        <td>
            <input type="text" name="sobrenome" value="<?= isset($cliente)? $cliente->sobrenome: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>DDD:</label></td>
        <td>
            <input type="text" name="ddd" value="<?= isset($cliente)? $cliente->ddd: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Telefone:</label></td>
        <td>
            <input type="text" name="telefone" value="<?= isset($cliente)? $cliente->telefone: "" ?>">
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="enviaForm" value="<?= isset($confirm)? "Confirmar": "Salvar" ?>"></td>
    </tr>
</table>
</form>
<br>
<!-- Cria um botão para voltar para a home -->
<a href="./?p=home">Voltar</a>