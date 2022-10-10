<?php 
    // Inclui o arquivo de controle
    require_once("./controler/cliente.php");
    use Controler\Cliente;
    // Chama a função de listar clientes do BD e armazena o retorno em um Array
    $clientes = new Cliente();
    $arrayClientes = $clientes->listaClientes();
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

