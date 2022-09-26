<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/alteraCliente.php");
    if(isset($_GET["alt"])){
        //Chama a função de alterar o Array e envia o ID, a função retorna um Array
        try{
        $arrayCli = alterarClientes((int)$_GET["alt"]);
        
        throw new Exception('dentro do.', 45);
    }catch(Exception $e){
        echo "Erro :". $e->getMessage();
        echo "<br> cod".$e->getCode();
    }
    }
    //Se o formulário foi enviado preenche um Array com os novos dados
    if(isset($_POST["id"])){
        $arrayCli = array (
            "id" => $_POST["id"],
            "nome" => $_POST["nome"],
            "sobrenome" => $_POST["sobrenome"],
            "ddd" => $_POST["ddd"],
            "telefone" => $_POST["telefone"],
        );
        //Chama a função para alterar o cliente e envia o Array alterado, a função retona uma string
        echo alterarCli($arrayCli);
    }
?>
<form method="post">
<!-- Preenche o value dos campos dos formulários com os dados -->
<input type="hidden" name="id" value="<?= isset($arrayCli)? $arrayCli['id'] : "" ?>">
<table>
    <tr>
        <td><label>Nome:</label></td>
        <td>
            <input type="text" name="nome" value="<?= isset($arrayCli)? $arrayCli["nome"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Sobreome:</label></td>
        <td>
            <input type="text" name="sobrenome" value="<?= isset($arrayCli)? $arrayCli["sobrenome"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>DDD:</label></td>
        <td>
            <input type="text" name="ddd" value="<?= isset($arrayCli)? $arrayCli["ddd"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td><label>Telefone:</label></td>
        <td>
            <input type="text" name="telefone" value="<?= isset($arrayCli)? $arrayCli["telefone"]: "" ?>">
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Salvar"></td>
    </tr>
</table>
</form>
<br>
<!-- Cria um botão para voltar para a home -->
<a href="./?p=home">Voltar</a>