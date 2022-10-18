<?php
namespace Model;
require_once($_SERVER['DOCUMENT_ROOT']."/AulaApi/Api/model/conexao.php");

class Cliente{
    public $id, $nome, $sobrenome, $ddd, $telefone;

    public function __get($nome){
        return $this->$nome;
    }

    public function __set($nome,$valor){
        return $this->$nome = $valor;
    }

// Cria uma função de cadastro de cliente no BD que recebe um Array
public function cadCliente($c){
    // Chama a função que cria um objeto PDO
    $pdo = Conexao::getConn();
    // Prepara a query retirando possíveis injections
    $sql = $pdo ->prepare("INSERT INTO clientes VALUES(null, ?, ?, ?, ?)");
    $sql-> bindValue(1,$c->__get("nome"));
    $sql-> bindValue(2,$c->__get("sobrenome"));
    $sql-> bindValue(3,$c->__get("ddd"));
    $sql-> bindValue(4,$c->__get("telefone"));
    // Executa a query preparada
    $sql -> execute();
    // Retorna o Ultimo id Inserido
    $pdo -> lastinsertid();
    // Retorna uma string
    return "Cliente Incluído com Sucesso!<br>";

}
// Cria uma função para alterar o cliente que recebe um Array
public function alteraCliente($c){
    // Chama a função que cria um objeto PDO
    $pdo = Conexao::getConn();
    // Executa um Update na talbela clientes
    $pdo -> exec('UPDATE clientes SET nome="'.$c->nome.'",
    sobrenome="'.$c->sobrenome.'",
    ddd="'.$c->ddd.'",
    telefone="'.$c->telefone.'" WHERE id="'.$c->id.'"');
    return "Cliente Alterado com Sucesso!<br>";
}
// Cria uma função de listar Array
public function listaClientes (){
    // Chama a função que cria um objeto PDO
    $pdo = Conexao::getConn();
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
public function buscaCliente($id){
    // Chama a função que cria um objeto PDO
    $pdo = Conexao::getConn();
    // Prepara a query para ser executada
    $sql = $pdo -> prepare("SELECT * FROM clientes WHERE id = :id");
    // Executa a query
    $sql -> execute(array('id' => $id));
    // Recebe um Array com o cliente selecionado
    $cliente = $sql->fetch(\PDO::FETCH_ASSOC);
    // Retorna um Array com o cliente
    return $cliente;
}
//Cria uma função para deletar no BD
public function deletaCliente($id){
    
    // Chama a função que cria um objeto PDO
    $pdo = Conexao::getConn();
    // Executa a query para deletar
    $pdo ->exec("DELETE FROM clientes WHERE id=$id");
    // Retorna um texto
    return "Cliente $id foi deletado com sucesso!<br>";
}
}
?>



