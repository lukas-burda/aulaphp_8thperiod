<?php 
    require_once('./functions/crud.php');
    
    $pessoas = fetchpessoas();

    foreach($pessoas as $key => $pessoa){
        echo "Id:".$pessoa["id"]."<br>";
        echo "name:".$pessoa["name"]."<br>";
        echo "Document:".$pessoa["document"]."<br>";
        echo "Type:".$pessoa["type"]."<br>";
        echo '<a href="./?p=form&delete='.$pessoa["id"].'"> DELETAR </a>|';
        echo '<a href="./?p=form&edit='.$pessoa["id"].'"> EDITAR </a>';
        echo "<hr>";
    };
?>