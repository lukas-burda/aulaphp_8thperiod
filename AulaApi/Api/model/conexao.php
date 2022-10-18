<?php
//Definindo o namespace
namespace Model;
//Criando uma Classe de conexão
class Conexao{
    //Definindo o atributo que receberá a conexão.
    private static $conn;

    public static function getConn(){
        //Se a conexão não exstir
        if(!isset(self::$conn)){
            //A conxão será criada.
            self::$conn = new \PDO("mysql:host=localhost; dbname=aula", "root","");
        }
        //Retorna a conexão. 
        return self::$conn;
    }
}

?>