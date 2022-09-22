<?php
require_once('./functions/crudpessoas.php');

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    delete($id);
};


if (isset($_GET['edit'])) {
    $array = fetchtable('pessoas');
    foreach ($array as $key) {
        if ($key['id'] == $_GET['edit']) {
            $id = $key['id'];
            $name = $key['name'];
            $document = $key['document'];
            $type = $key['type'];
        }
    }
}

if (isset($_POST['name'])) {
    $pessoa = array(
        'name' => $_POST['name'],
        'document' => $_POST['document'],
        'type' => $_POST['type']
    );

    if (isset($_GET['editar'])) {
        $pessoa['id'] = $_GET['editar'];
        edit($pessoa);
    } else {
        if (isset($_POST['name'])) {
            create($pessoa);
        }
    }
}
?>

<form action="<?= isset($name) ? "./?p=formpessoa&editar=$id" : "" ?>" method="post">
    <input name="id" disabled value="<?= isset($name) ? $id : ""; ?>"><br>
    <label>Nome</label>
    <input type="text" name="name" value="<?= isset($name) ? $name : ""; ?>"><br>
    <label>Document</label>
    <input type="text" name="document" value="<?= isset($document) ? $document : ""; ?>"><br>
    <label>Type</label>
    <input type="text" name="type" value="<?= isset($type) ? $type : ""; ?>"><br>
    <button type="submit" value="save" class="btn btn-success"> Salvar</button>
</form>