<?php
$variavel = "529.982.247-22";
//Retirando caracteres
$ncpf =  str_replace (array("/",".","-"), "", $variavel);
echo $variavel;
/*echo "<hr>";
//Dividindo Strings
$part_1  = substr($cpf, 0, 3);
$part_2  = substr($cpf, 3, 3);
$part_3  = substr($cpf, 6, 3);
$part_4  = substr($cpf, 9, 2);
echo "$part_1 = $part_2 = $part_3 = $part_4";
            // Calcula os números para verificar se o CPF é 
*/
    echo "<hr>";
    function validaCPF($cpf){
    for ($d=1; $soma = 0, $mult = 9 + $d, $d <3; $d++){
        for ($cont = 0; $mult > 1  ; $mult--, $cont++) {
            $soma += substr($cpf, $cont, 1) * $mult;
        }
    $digito = ((10 * $soma) % 11);
        if (substr($cpf, $cont, 1) == $digito AND $d == 2 ){
             return true;
        }else{return false;}
    }
}

 echo validaCPF($ncpf)? "CPF Válido": "CPF Inválido";

echo "<br>";
   /* 
    if (substr($cpf, $cont, 1) != $digito) {
        echo "CPF FALSO";
    }else{

        echo "CPF VERDADEIRO";
    }*/


echo "<br>";
echo $email = "e-mail@dominio";

echo "<br>";
//Validando E-mail
echo filter_var($email, FILTER_VALIDATE_EMAIL)? "E-mail Valido":  "E-mail Inválido"; 








?>
