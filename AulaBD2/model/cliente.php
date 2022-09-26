<?php
// Cria um objeto PDO com a string de conexão do banco de dados
function conectaBD(){
    return new PDO("mysql:host=localhost; dbname=aula", "root","");
}
// Cria uma função de cadastro de cliente no BD que recebe um Array
function cadCliente($arrayCliente){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query retirando possíveis injections
    $sql = $pdo ->prepare("INSERT INTO clientes VALUES(null, ?, ?, ?, ?)");
    // Executa a query preparada
    $sql -> execute(array_values($arrayCliente));
    // Retorna uma string
    return "Cliente Incluído com Sucesso!<br>";

}
// Cria uma função para alterar o cliente que recebe um Array
function alteraCliente($cliente){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa um Update na talbela clientes
    $pdo -> exec('UPDATE clientes SET nome="'.$cliente['nome'].'",
    sobrenome="'.$cliente['sobrenome'].'",
    ddd="'.$cliente['ddd'].'",
    telefone="'.$cliente['telefone'].'" WHERE id="'.$cliente['id'].'"');
    return "Cliente Alterado com Sucesso!<br>";
}
// Cria uma função de listar Array
function listaClientes (){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM clientes");
    // Executa a query
    $sql -> execute();
    // Armazena o retorno em um Array
    $clientes = $sql -> fetchAll();
    // Retorna o Array preenchido
    return $clientes;
    
}
// Cria uma função de busca de cliente que recebe um id
function buscaCliente($id){
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM clientes WHERE id = :id");
    // Executa a query
    $sql -> execute(array('id' => $id));
    // Recebe um Array com o cliente selecionado
    $clientes = $sql->fetch();
    // Retorna um Array com o cliente
    return $clientes;
}
//Cria uma função para deletar no BD
function deletaCliente($id){
    
    // Chama a função que cria um objeto PDO
    $pdo = conectaBD();
    // Executa a query para deletar
    $pdo ->exec("DELETE FROM clientes WHERE id=$id");
    // Retorna um texto
    return "Cliente $id foi deletado com sucesso!<br>";
}

?>



