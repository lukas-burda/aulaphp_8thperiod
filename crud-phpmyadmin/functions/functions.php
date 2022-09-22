<?php
function load_page()
{
  isset($_GET['p']) && $_GET['p']!='' ? require_once("./pages/" . $_GET['p'] . ".php") : require_once('./pages/notfound.php');
};

function load_titulos()
{
  isset($_GET['p']) ? $page = $_GET['p'] : $page = "";

  switch ($page) {
    default:
      echo $page;
      break;
  }
}
