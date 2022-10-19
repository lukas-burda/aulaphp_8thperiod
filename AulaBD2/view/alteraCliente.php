<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/alteraCliente.php");
    if(isset($_GET["alt"])){
        //Chama a função de alterar o Array e envia o ID, a função retorna um Array
    try{
        $arrayCli = alterarClientes((int)$_GET["alt"]);
    }catch(Exception $e){
        echo $e->getMessage();
    }

    }
    //Se o formulário foi enviado preenche um Array com os novos dados
    if(isset($_POST["id"])) { 
           
        $arrayAntigo = alterarClientes((int)$_GET["alt"]);
        echo "Dados Antigos <br>
        Nome: ". $arrayAntigo["nome"]."<br>
        Sobrenome: ". $arrayAntigo["sobrenome"]."<br>
        DD: ". $arrayAntigo["ddd"]."<br>
        Telefone: ". $arrayAntigo["telefone"]."<br>";
        
        $arrayCli = array (
        "id" => $_POST["id"],
        "nome" => $_POST["nome"],
        "sobrenome" => $_POST["sobrenome"],
        "ddd" => $_POST["ddd"],
        "telefone" => $_POST["telefone"],
    );
    $confirm = true;
    }

    if(isset($_POST["enviaForm"]) && $_POST["enviaForm"] == "Confirmar"){
        //Chama a função para alterar o cliente e envia o Array alterado, a função retona uma string
        alterarCli($arrayCli);
    }
?>
<form method="post">
<!-- Preenche o value dos campos dos formulários com os dados -->
<input type="hidden" name="id" value="<?= isset($arrayCli)? $arrayCli['id'] : "" ?>">
<table>
    <tr>
        <td><label>Nome:</label></td>
        <td>
            <input type="text" name="nome" value="<?= isset($arrayCli)? $arrayCli["nome"]: "" ?>" required>
        </td>
    </tr>
    <tr>
        <td><label>Sobreome:</label></td>
        <td>
            <input type="text" name="sobrenome" value="<?= isset($arrayCli)? $arrayCli["sobrenome"]: "" ?>" required>
        </td>
    </tr>
    <tr>
        <td><label>DDD:</label></td>
        <td>
            <input type="text" name="ddd" value="<?= isset($arrayCli)? $arrayCli["ddd"]: "" ?>" required>
        </td>
    </tr>
    <tr>
        <td><label>Telefone:</label></td>
        <td>
            <input type="text" name="telefone" value="<?= isset($arrayCli)? $arrayCli["telefone"]: "" ?>" required>
        </td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="enviaForm" value="<?= isset($confirm)? "Confirmar": "Salvar" ?>" required></td>
    </tr>
</table>
</form>
<br>
<!-- Cria um botão para voltar para a home -->
<a href="./?p=home">Voltar</a>


