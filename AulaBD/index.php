<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Página com BD</title>
</head>
<body>
<h1> Trabalhando com Banco de Dados</h1>

<?php
//Coneta ao banco de dados
$pdo = new PDO("mysql:host=localhost; dbname=aula", "root","");

//verifica se o formulário foi enviado
if (isset($_POST['nome'])){
    //Adiciona o resulatdo em um Array
    $array = array($_POST["nome"], $_POST["sobrenome"], $_POST["ddd"], $_POST["telefone"]);

    // Verifica se foi solicitada uma alteração, se não faz a inclusão
    if(isset($_GET['alt'])){
        // Faz a alteração do cliente
        $pdo -> exec('UPDATE clientes SET nome="'.$_POST['nome'].'",
        sobrenome="'.$_POST['sobrenome'].'",
        ddd="'.$_POST['ddd'].'",
        telefone="'.$_POST['telefone'].'" WHERE id="'.$_GET['alt'].'"');
        echo "Cliente Alterado com Sucesso!<br>";
    }else{
        // Se não for uma alteração inclui um clinte novo
        $sql = $pdo ->prepare("INSERT INTO clientes VALUES(null, ?, ?, ?, ?)");
        $sql -> execute(array_values($array));
        echo "Cliente Incluído com Sucesso!<br>";
    }
}

//Busca clientes no banco de dados
$sql = $pdo ->prepare("SELECT * FROM clientes");
$sql -> execute();

//forma o resutlado em um Array
$fetchClientes = $sql ->fetchAll();

//Percorre o Array e retorna o resultado
foreach($fetchClientes as $key => $cliente){
    echo '<a href="?deleta='.$cliente["id"].'"> DELETAR </a> |';
    echo '<a href="?altera='.$cliente["id"].'"> ALTERAR </a><br>';
    echo "Nome: ".$cliente["nome"]."<br>";
    echo "Sobrenome: ".$cliente["sobrenome"]."<br>";
    echo "DDD: ".$cliente["ddd"]."<br>";
    echo "Telefone: ".$cliente["telefone"]."<br>";
    echo "<hr>";
}

//recebe cliente para ser deletado
if (isset($_GET["deleta"])){
    $id = (int)$_GET["deleta"];

//deleta o cliente
    $pdo ->exec("DELETE FROM clientes WHERE id=$id");
    echo "Cliente $id foi deletado com sucesso!<br>";
}

//recebe id do cliente para ser alterado
if (isset($_GET["altera"])){
//Salva os dados do cliente em variáveis
    foreach($fetchClientes as $cliente){
        if($cliente["id"] == $_GET["altera"]){
        $id = $cliente["id"];
        $nome = $cliente["nome"];
        $sobrenome = $cliente["sobrenome"];
        $ddd = $cliente["ddd"];
        $telefone = $cliente["telefone"];
        }
    }
}


?>
<!-- Formulário em HTML 
    Se o cliente foi alterado as variáveis existem e o valor delas é preenchido no formulário
-->
<form action="<?= isset($nome)? "./?alt=$id": "" ?>" method="post">
    <input type="hidden" name="id" value="<?= isset($nome)? $id : ""; ?>"><br>
    <label>Nome:</label>
    <input type="text" name="nome" value="<?= isset($nome)? $nome : ""; ?>"><br>
    <label>Sobreome:</label>
    <input type="text" name="sobrenome" value="<?= isset($nome)? $sobrenome : ""; ?>"><br>
    <label>DDD:</label>
    <input type="text" name="ddd" value="<?= isset($nome)? $ddd : ""; ?>"><br>
    <label>Telefone:</label>
    <input type="text" name="telefone" value="<?= isset($nome)? $telefone : ""; ?>"><br>
    <input type="submit" value="Salvar"><br>
</form>



<br><br><br><br><br><br><br>



</body>
</html>