<?php 
    require_once('./functions/crudcars.php');
    
    echo "<a href='?p=cars'><button>Listar carros</button></a><br><hr>";

    $cars = fetchtable('cars');

    foreach($cars as $key => $car){
        echo "<b>Id: </b><input disabled value=".$car["id"]."></input><br>";
        echo "<b>Nome do carro</b>:".$car["carname"]."<br>";
        echo "<b>Placa:</b>".$car["placa"]."<br>";
        echo '<a href="./?p=formcars&delete='.$car["id"].'"> DELETAR </a> ';
        echo '<a href="./?p=formcars&edit='.$car["id"].'"> EDITAR </a>';
        echo "<hr>";
    };
?>