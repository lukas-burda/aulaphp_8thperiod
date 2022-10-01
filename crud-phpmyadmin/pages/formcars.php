<?php
require_once('./functions/crudcars.php');

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    delete($id);
};


if (isset($_GET['edit'])) {
    $array = fetchtable('cars');
    foreach ($array as $key) {
        if ($key['id'] == $_GET['edit']) {
            $id = $key['id'];
            $carname = $key['carname'];
            $placa = $key['placa'];
        }
    }
}

if (isset($_POST['carname'])) {
    $address = array(
        'carname' => $_POST['carname'],
        'placa' => $_POST['placa']
    );

    if (isset($_GET['editar'])) {
        $address['id'] = $_GET['editar'];
        edit($address);
    } else {
        if (isset($_POST['carname'])) {
            create($address);
        }
    }
}
?>


<div>
    <form action="<?= isset($carname) ? "./?p=formcars&editar=$id" : "" ?>" method="post">
        <input name="id" disabled value="<?= isset($carname) ? $id : ""; ?>"><br>
        <label>Nome do carro</label>
        <input type="text" name="carname" value="<?= isset($carname) ? $carname : ""; ?>"><br>
        <label>Placa</label>
        <input type="text" name="placa" value="<?= isset($placa) ? $placa : ""; ?>">
        <button type="submit" value="save">Salvar</button>
    </form>
    <hr>
    <a href='?p=cars'><button>Listar carros</button></a>
</div>