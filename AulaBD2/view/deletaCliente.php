<br><br>
<?php
    // Inclui o arquivo de controle
    require_once("./controler/delCliente.php");
    if (isset($_GET["del"])){
        //Chama a função de deletar e envia o ID, a função retorna uma string
        echo deletaCli ($_GET["del"]);
    }

?>
<br>
<!-- Cria um botão para voltar para a home -->
<a href="./?p=home">Voltar</a>