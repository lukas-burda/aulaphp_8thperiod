<?php
function conn_db()
{
    return new PDO("mysql:host=127.0.0.1:3308; dbname=aula-database", "root", "");
}

function fetchtable($table){
    $pdo = conn_db();

    $sql = $pdo -> prepare("SELECT * FROM $table");
    $sql -> execute();
    return $sql;
}
