<!-- <p>RGM 12932868 Vinicius Junior</p>
    <p>RGM 12955086 Pedro Henrique</p>

Avaliação do <p>RGM 13017179 Lukas Burda</p> 
Solicitações do professor:
Confirmação de editar
Confirmação de deletar exibindo os dados que serão deletados
-->

<?php require_once('./functions/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php require_once('./functions/functions.php');
            load_titulos() ?></title>
</head>
<style>
    body{padding: 20px;}
</style>
<body>
    <div >
        <?php
        include './pages/header.php';
        load_page();
        include './pages/footer.php';
        ?>
    </div>

</body>

</html>