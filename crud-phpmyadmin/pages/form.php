<?php
    require_once('./functions/crud.php');

    
    
    if(isset($_GET['delete'])){
        $id = (int) $_GET['delete'];
        delete($id);
    };


    if(isset($_GET['edit'])){
        $array = fetchpessoas();
        foreach($array as $key){
            if($key['id'] == $_GET['edit']){
                $id = $key['id']; 
                $name = $key['name'];
                $document = $key['document'];  
                $type = $key['type']; 
            }
        }
    }

    if(isset($_POST['name'])){
        $pessoa = array(
         'name' => $_POST['name'],
         'document' => $_POST['document'], 
         'type' => $_POST['type']
        );

        if(isset($_GET['editar'])){
            $pessoa['id'] = $_GET['editar'];
            edit($pessoa);
            var_dump($pessoa);
        } else {
            if(isset($_POST['name'])){
                create($pessoa);
            }
        }
        
    }
?>

<form action="<?= isset($name)? "./?p=form&editar=$id": "" ?>" method="post">
    <hr style="margin-top: 25px">
    <input name="id" disabled value="<?= isset($name)? $id : ""; ?>"><br>
    <label>Nome</label>
    <input type="text" name="name" value="<?= isset($name)? $name : ""; ?>"><br>
    <label>Document</label>
    <input type="text" name="document" value="<?= isset($document)? $document : ""; ?>"><br>
    <label>Type</label>
    <input type="text" name="type" value="<?= isset($type)? $type : ""; ?>"><br>
    <input type="submit" value="save">
</form>
