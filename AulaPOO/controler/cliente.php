<?php
namespace Model;
require_once("./model/clienteDao.php");

class Cliente{
    public $id, $nome, $sobrenome, $ddd, $telefone;
    

    public function __construct(){
    }

    public function __get($nome){
        return $this->$nome;
    }

    public function __set($nome,$valor){
        return $this->$nome = $valor;
    }

    public function __toString(){
        return $this->$nome = $valor;
    }

    public function listaClientes (){
        $clientes = new ClienteDao();
        return $clientes->listaClientes();       
    }
    public function deletaCliente($id){
        $cliente = new ClienteDao();
        return $cliente->deletaCliente($id);       
    }
    public function cadCliente(){
        $cliente = new ClienteDao();
        return $cliente->cadCliente($this);   
    }
    public function buscaCliente($id){
        $cliente = new ClienteDao();
        return json_encode($cliente->buscaCliente($id));   
    }
    public function alteraCliente($cli){
        $cliente = new ClienteDao();
        $cliente->alteraCliente($cli);
        return $cliente;   
    }
    


}