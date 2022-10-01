<?php
require_once('./functions/crudpessoas.php');

if (isset($_GET['pessoa'])) {
    $id = $_GET['pessoa'];
}

if (isset($_GET['confirmado'])) {
    delete($id);
}

if (isset($_GET['pessoa'])) {
    $array = fetchtable('pessoas');
    foreach ($array as $key) {
        if ($key['id'] == $_GET['pessoa']) {
            $id = $key['id'];
            $name = $key['name'];
            $document = $key['document'];
            $type = $key['type'];
            echo "Deletar o usuário:";
        }
    }
}
?>

<form action="<?= isset($name) ? "./?p=formpessoa&editar=$id" : "" ?>" method="post">
    <input name="id" disabled value="<?= isset($name) ? $id : ""; ?>"><br>
    <label>Nome</label>
    <input type="text" disabled name="name" value="<?= isset($name) ? $name : ""; ?>"><br>
    <label>Document</label>
    <input type="text" disabled name="document" value="<?= isset($document) ? $document : ""; ?>"><br>
    <label>Type</label>
    <input type="text" disabled  name="type" value="<?= isset($type) ? $type : ""; ?>"><br>
</form>

<form action="<?= isset($id) ? "./?p=confirmardelete&confirmado=true&pessoa=$id" : "" ?>" method="post">
    <button type="submit">Confirmar ação?</button>
</form>