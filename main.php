<?php
require_once('functions.php');
$n_elementos = readline("Entre com o último número do intervalo de elementos: ");
$salto = readline("entre com o salto de elementos para cada amostra de dados: ");
$op = readline("Qual opção deseja fazer? (I: INSERTION SORT M: MERGE SORT) ");
switch ($op) {
    case 'I':
        $myfile = fopen("data.json", "w") or die("Unable to open file!");
        fwrite($myfile, "{\n\t\"data\":[");
        $n_amostra = $salto;
        while ($n_amostra <= $n_elementos) {
            $v = [];
            for ($i=0; $i < $n_amostra; $i++) {
                $v[$i] = rand(1, 2147483647);
            } 
            $initaltime = microtime(true); 
            insertionSort($v);
            $finaltime = microtime(true); 
            $timetotal = $finaltime - $initaltime;
            echo("\tNúmero de amostras utilizado: " . $n_amostra . "\tTempo decorrido da ordenação do array: " . $timetotal . "\tMétodo de ordenação: INSERTION SORT\t\n");
            if($n_amostra == $n_elementos) {
                fwrite($myfile, "\n\t\t{\n\t\t\t\"n_amostras\":\"".$n_amostra."\",\n\t\t\t\"tempo\":\"".$timetotal."\"\n\t\t}");
            } else {
                fwrite($myfile, "\n\t\t{\n\t\t\t\"n_amostras\":\"".$n_amostra."\",\n\t\t\t\"tempo\":\"".$timetotal."\"\n\t\t},");
            }
            $n_amostra= $n_amostra + $salto;
        }
        fwrite($myfile, "\n\t]\n}");
        $op2 = readline("deseja armazenar o array resultante em um .txt?(será salvo na raiz deste diretório) S/N: ");
        switch ($op2) {
            case 'S':
            $myfile = fopen("InsertionSortOutputWith".$n_elementos."Elements.JSON", "w") or die("Unable to open file!");
            echo(".txt criado com sucesso! Nome do arquivo: InsertionSortOutputWith".$n_elementos."Elements.txt");

            fwrite($myfile, print_r($v, true));
            fclose($myfile);
                break;
            
            default:
                echo("opção irreconhecida, fim de programa.");
                break;
        }
        break;
    case 'M':
    $myfile = fopen("data.json", "w") or die("Unable to open file!");
    fwrite($myfile, "{\n\t\"data\":[");
    $n_amostra = $salto;
    while ($n_amostra <= $n_elementos) {
        $v = [];
        for ($i=0; $i < $n_amostra; $i++) {
            $v[$i] = rand(1, 2147483647);
        } 
        $initaltime = microtime(true); 
        mergeSort($v);
        $finaltime = microtime(true); 
        $timetotal = $finaltime - $initaltime;
        echo("\tNúmero de amostras utilizado: " . $n_amostra . "\tTempo decorrido da ordenação do array: " . $timetotal . "\tMétodo de ordenação: MERGE SORT\t\n");
        if($n_amostra == $n_elementos) {
            fwrite($myfile, "\n\t\t{\n\t\t\t\"n_amostras\":\"".$n_amostra."\",\n\t\t\t\"tempo\":\"".$timetotal."\"\n\t\t}");
        } else {
            fwrite($myfile, "\n\t\t{\n\t\t\t\"n_amostras\":\"".$n_amostra."\",\n\t\t\t\"tempo\":\"".$timetotal."\"\n\t\t},");
        }
        $n_amostra= $n_amostra + $salto;
    }
    fwrite($myfile, "\n\t]\n}");
    $op2 = readline("deseja armazenar o array resultante em um .txt?(será salvo na raiz deste diretório) S/N: ");
    switch ($op2) {
            case 'S':
            $myfile = fopen("MergenSortOutputWith".$n_elementos."Elements.txt", "w") or die("Unable to open file!");
            fwrite($myfile, print_r($v, true));
            fclose($myfile);
            echo(".txt criado com sucesso! Nome do arquivo: MergenSortOutputWith".$n_elementos."Elements.txt");
                break;
            
            default:
                echo("opção irreconhecida, fim de programa.");
                break;
        }
        break;
    default:
        echo("opção irreconhecida, fim de programa.");
        break;
}

?>