<?php
require_once('./functions/crudpessoas.php');
global $pessoa;

if (isset($_GET['editar'])) {
    $array = fetchtable('pessoas');
    foreach ($array as $key) {
        if ($key['id'] == $_GET['editar']) {
            $pessoa = array(
                $id = $key['id'],
                'id' => $key['id'],
                'name' => $key['name'],
                'document' => $key['document'],
                'type' => $key['type']
            );
        }
    }

    if (isset($_GET['confirmado'])) {
        if (isset($_GET['editar'])) {
            $array = fetchtable('pessoas');
            foreach ($array as $key) {
                if ($key['id'] == $_GET['editar']) {
                    $pessoa = array(
                        'id' => $key['id'],
                        'name' => $key['name'],
                        'document' => $key['document'],
                        'type' => $key['type']
                    );
                    edit($pessoa);
                }
            }
        }

    }
}

?>

<form action="<?= isset($id) ? "./?p=confirmaredit&confirmado=true&editar=$id" : "" ?>" method="post">
    <button type="submit">Confirmar ação?</button>
</form>