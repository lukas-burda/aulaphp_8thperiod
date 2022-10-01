<?php 
    require_once('./functions/crudpessoas.php');
    
    echo "<a href='?p=formpessoa'><button>Cadastrar pessoa</button></a><br><hr>";
    $pessoas = fetchtable('pessoas');

    foreach($pessoas as $key => $pessoa){
        echo "<b>Id: </b><input disabled value=".$pessoa["id"]."></input><br>";
        echo "<b>Name</b>:".$pessoa["name"]."<br>";
        echo "<b>Document:</b>".$pessoa["document"]."<br>";
        echo "<b>Type:</b>".$pessoa["type"]."<br>";
        echo '<a href="./?p=confirmardelete&pessoa='.$pessoa["id"].'"> DELETAR </a> ';
        echo '<a href="./?p=formpessoa&edit='.$pessoa["id"].'"> EDITAR </a>';
        echo "<hr>";
    };
?>