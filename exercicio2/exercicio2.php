<?php

function exerciseArray()
{
    #Cria o array e mostra o valor da posicao 3 do mesmo.
    $array = [2, 4, 1, 4, 2, 1, 1];
    echo "Posicao 3 do Array: " . $array[3];

    #Converte array em string
    $arrayToString = implode("','", $array);
    echo "\n Array para String: ";
    var_dump($arrayToString);

    #Converte String em Array
    $stringToArray = explode("','", $arrayToString);
    echo "\n String para Array: ";
    var_dump($stringToArray);

    #Exclui array
    unset($array);

    #Verifica se tem o numero 14 no array
    if (array_search(14, $stringToArray)) {
        echo "\n Existe o numero 14 no array";
    } else {
        echo "\n Não existe o numero 14 no array \n";
    }


    #Verifica se a posicao atual é menor que a anterior e remove do array
    $arrayAux = $stringToArray;
    for ($i=0; $i < count($arrayAux); $i++) {
        if (isset($arrayAux[$i-1]) && $arrayAux[$i] < $arrayAux[$i-1]) {
            unset($stringToArray[$i]);
        }
    }

    var_dump($stringToArray);

    #Remove última posicao array
    array_pop($stringToArray);
    var_dump($stringToArray);

    #Conta elementos no array
    echo "Quantia de elementos no array: " . count($stringToArray);

    #Inverte posições do array
    $arrayReverse = array_reverse($stringToArray);
    var_dump($arrayReverse);
}

exerciseArray();