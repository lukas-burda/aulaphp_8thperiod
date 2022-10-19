<?php
namespace Controler;

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

   /* public function __toString(){
        return $this->$nome = $valor;
    }*/

    public function listaClientes (){
        $curl = curl_init();
        //Setando Opções do Curl
        curl_setopt_array( $curl,
            array(
                CURLOPT_URL => "localhost/AulaApi/Api/listaClientes.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => ["TESTEAPI:".password_hash("teste", PASSWORD_DEFAULT)],
            )
        );

        //Executando o Curl
        $dados = curl_exec($curl,);
        return json_decode($dados, true);
        //Fechando conexão  
        curl_close($curl);  
    }

    public function deletaCliente($id){
        $curl = curl_init();
        //Setando Opções do Curl
        curl_setopt_array( $curl,
            array(
                CURLOPT_URL => "localhost/AulaApi/Api/deletaCliente.php",
                CURLOPT_RETURNTRANSFER => false,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "id=$id",
                CURLOPT_HTTPHEADER => ["TESTEAPI:".password_hash("teste", PASSWORD_DEFAULT)],
            )
        );

        //Executando o Curl
        $dados = curl_exec($curl);
        
        //Fechando conexão  
        curl_close($curl);     
    }
    public function cadCliente(){

        $curl = curl_init();
        //Setando Opções do Curl
        curl_setopt_array( $curl,
            array(
                CURLOPT_URL => "localhost/AulaApi/Api/cadCliente.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($this),
                CURLOPT_HTTPHEADER => ["TESTEAPI:".password_hash("teste", PASSWORD_DEFAULT)],
            )
        );

        //Executando o Curl
        $dados = curl_exec($curl);
        
        //Fechando conexão  
        curl_close($curl);  
    }
    public function buscaCliente($id){
        $curl = curl_init();
        //Setando Opções do Curl
        curl_setopt_array( $curl,
            array(
                CURLOPT_URL => "localhost/AulaApi/Api/buscaCliente.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "id=$id",
                CURLOPT_HTTPHEADER => ["TESTEAPI:".password_hash("teste", PASSWORD_DEFAULT)],
            )
        );

        //Executando o Curl
        return json_decode($dados = curl_exec($curl), false);
        
        //Fechando conexão  
        curl_close($curl);   
    }
    public function alteraCliente($cli){
        $curl = curl_init();
        //Setando Opções do Curl
        curl_setopt_array( $curl,
            array(
                CURLOPT_URL => "localhost/AulaApi/Api/altCliente.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($cli),
                CURLOPT_HTTPHEADER => ["TESTEAPI:".password_hash("teste", PASSWORD_DEFAULT)],
            )
        );
        //Executando o Curl
        $dados = curl_exec($curl);
        
        //Fechando conexão  
        curl_close($curl);  
    }
    


}