<?php 
    function load_page(){
        isset($_GET['p']) ? require_once("./pages/".$_GET['p'].".php") : require_once('./pages/notfound.php');
    };

?>