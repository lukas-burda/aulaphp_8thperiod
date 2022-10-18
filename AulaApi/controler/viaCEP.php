<?php
//Definindo um Namespace
namespace ApiCep;
//Criando a Classe da API
class ViaCEP{
public static function buscaCEP($cep){
    //iniciando o Curl
    $curl = curl_init();
    //Setando Opções do Curl
    curl_setopt_array( $curl,
        array(
            CURLOPT_URL => "viacep.com.br/ws/$cep/json/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        )
    );
    //Executando o Curl
    $dados = curl_exec($curl,);   
    //Fechando conexão  
    curl_close($curl);
    //Convertendo Json em Array
    return json_decode($dados, true);
}

}
?>