<?php 
    require_once('./functions/crudpessoas.php');
    
    $pessoas = fetchtable('pessoas');

    foreach($pessoas as $key => $pessoa){
        echo "<b>Id: </b><input disabled value=".$pessoa["id"]."></input><br>";
        echo "<b>Name</b>:".$pessoa["name"]."<br>";
        echo "<b>Document:</b>".$pessoa["document"]."<br>";
        echo "<b>Type:</b>".$pessoa["type"]."<br>";
        echo '<a class="btn btn-danger" href="./?p=formpessoa&delete='.$pessoa["id"].'"> DELETAR </a> ';
        echo '<a class="btn btn-primary" href="./?p=formpessoa&edit='.$pessoa["id"].'"> EDITAR </a>';
        echo "<hr>";
    };
?>