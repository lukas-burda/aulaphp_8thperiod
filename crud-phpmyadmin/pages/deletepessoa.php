<?php
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
};
?>
<div>
    <form action="<?= isset($name) ? "./?p=confirmardelete&pessoa=$id" : "" ?>" method="post">
        <input name="id" disabled value="<?= isset($name) ? $id : ""; ?>"><br>
        <label>Nome</label>
        <input type="text" name="name" value="<?= isset($name) ? $name : ""; ?>"><br>
        <label>Document</label>
        <input type="text" name="document" value="<?= isset($document) ? $document : ""; ?>"><br>
        <label>Type</label>
        <input type="text" name="type" value="<?= isset($type) ? $type : ""; ?>"><br>
        <button type="submit" id="delete" value="save"  > Deletar</button>
    </form>
    <hr>
    <a href='?p=pessoas'><button>Listar pessoas</button></a>
</div>