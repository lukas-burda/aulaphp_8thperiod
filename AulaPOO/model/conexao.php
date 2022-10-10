<?php
namespace Model;
class Conexao{
    private static $conn;

    public static function getConn(){
        if(!isset(self::$conn)){
            self::$conn = new \PDO("mysql:host=localhost; dbname=aula", "root","");
        }    
        return self::$conn;
    }
}

?>