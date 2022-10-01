<?php 
    require_once('./functions/crudaddresses.php');

    echo "<a href='?p=formaddresses'><button>Cadastrar endereço</button></a><br><hr>";
    
    $addresses = fetchtable('addresses');

    foreach($addresses as $key => $address){
        echo "<b>Id: </b><input disabled value=".$address["id"]."></input><br>";
        echo "<b>Name</b>:".$address["cep"]."<br>";
        echo "<b>Document:</b>".$address["number"]."<br>";
        echo '<a href="./?p=formaddresses&delete='.$address["id"].'"> DELETAR </a> ';
        echo '<a href="./?p=formaddresses&edit='.$address["id"].'"> EDITAR </a>';
        echo "<hr>";
    };
?>