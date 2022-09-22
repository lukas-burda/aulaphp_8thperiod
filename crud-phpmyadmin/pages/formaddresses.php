<?php
require_once('./functions/crudaddresses.php');

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    delete($id);
};


if (isset($_GET['edit'])) {
    $array = fetchtable('addresses');
    foreach ($array as $key) {
        if ($key['id'] == $_GET['edit']) {
            $id = $key['id'];
            $cep = $key['cep'];
            $number = $key['number'];
        }
    }
}

if (isset($_POST['cep'])) {
    $address = array(
        'cep' => $_POST['cep'],
        'number' => $_POST['number']
    );

    if (isset($_GET['editar'])) {
        $address['id'] = $_GET['editar'];
        edit($address);
    } else {
        if (isset($_POST['cep'])) {
            create($address);
        }
    }
}
?>

<form action="<?= isset($cep) ? "./?p=formaddresses&editar=$id" : "" ?>" method="post">
    <input name="id" disabled value="<?= isset($cep) ? $id : ""; ?>"><br>
    <label>Cep</label>
    <input type="number" name="cep" value="<?= isset($cep) ? $cep : ""; ?>"><br>
    <label>Number</label>
    <input type="number" name="number" value="<?= isset($number) ? $number : ""; ?>">
    <button type="submit" value="save" class="btn btn-success"> Salvar</button>
</form>