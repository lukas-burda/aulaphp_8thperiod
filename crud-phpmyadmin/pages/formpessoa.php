<?php
require_once('./functions/crudpessoas.php');

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $array = fetchtable('pessoas');
    foreach ($array as $key) {
        if ($key['id'] == $id) {
            $id = $key['id'];
            $name = $key['name'];
            $document = $key['document'];
            $type = $key['type'];
        }
    }
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
    } else {
        if (isset($_POST['name'])) {
            create($pessoa);
        }
    }
}
?>
<div>
    <form action="<?= isset($id) ? "./?p=confirmaredit&confirmado=true&editar=$id": "./?p=formpessoa" ?>" method="post">
        <input name="id" disabled value="<?= isset($name) ? $id : ""; ?>"><br>
        <label>Nome</label>
        <input type="text" name="name" value="<?= isset($name) ? $name : ""; ?>"><br>
        <label>Document</label>
        <input type="text" name="document" value="<?= isset($document) ? $document : ""; ?>"><br>
        <label>Type</label>
        <input type="text" name="type" value="<?= isset($type) ? $type : ""; ?>"><br>
        <button type="submit" id="submit" value="save"> Salvar</button>
    </form>
    <hr>
    <a href='?p=pessoas'><button>Listar pessoas</button></a>
</div>