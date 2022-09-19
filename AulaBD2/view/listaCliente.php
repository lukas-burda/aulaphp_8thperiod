<?php 
    // Inclui o arquivo de controle
    require_once("./controler/listaClientes.php");
    //Chama a função de listar clientes
    $arrayClientes = listarCliente();
    //Cria uma variável para concatenar os retornos
    $listaClientes = "<br><br><table>";
    //Percorre o Array com os clientes
    foreach($arrayClientes as $cliente){
        //Concatena em string o resultado do Array
        $listaClientes .='<tr>'
        .'<td><a href="?p=deletar&del='.$cliente["id"].'"> Deletar </a></td>'
        .'<td><a href="?p=alterar&alt='.$cliente["id"].'"> Alterar </a></td>'
        ."<td>Nome: ".$cliente["nome"]."</td>"
        ."<td>Sobrenome: ".$cliente["sobrenome"]."</td>"
        ."<td>DDD: ".$cliente["ddd"]."</td>"
        ."<td>Telefone: ".$cliente["telefone"]."</td>"
        ."</tr>";
    }
    //Retorna o Array completo e fecha a tabela
    echo "$listaClientes </table>";
?>

