<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./Chart/Chart.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>empirical analysis MASTER</title>
</head>
<body>
        <div id="app">
            <canvas id="myChart" width="1600" height="900"></canvas>
            <form enctype="multipart/form-data" action="app.php" method="POST">
                <h1>Qual tipo de método deseja utilizar?</h1>
                <select name="mySelect" >
                    <option value="I">INSERTION SORT</option>
                    <option value="M">MERGE SORT</option>
                </select>
                <h1>Qual o maior número de elementos e seu salto</h1>
                <input type="text" name="n_elementos">
                <input type="text" name="salto">
                <input type="submit" value="Go!" name="btnSubmit" class="btnSubmit">
            </form>
            <div class="loader"></div>
            </div>
            <div class="result">
            <?php
            ini_set('max_execution_time', 0); 
require_once('functions.php');
if(isset($_POST['btnSubmit'])){
    $salto = filter_input(INPUT_POST, "salto");
    $n_elementos = filter_input(INPUT_POST, "n_elementos");
    $op = filter_input(INPUT_POST, "mySelect");
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
                if($n_amostra == $n_elementos) {
                    fwrite($myfile, "\n\t\t{\n\t\t\t\"n_amostras\":\"".$n_amostra."\",\n\t\t\t\"tempo\":\"".$timetotal."\"\n\t\t}");
                } else {
                    fwrite($myfile, "\n\t\t{\n\t\t\t\"n_amostras\":\"".$n_amostra."\",\n\t\t\t\"tempo\":\"".$timetotal."\"\n\t\t},");
                }
                $n_amostra= $n_amostra + $salto;
            }
            fwrite($myfile, "\n\t]\n}");
            fclose($myfile);
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
            if($n_amostra == $n_elementos) {
                fwrite($myfile, "\n\t\t{\n\t\t\t\"n_amostras\":\"".$n_amostra."\",\n\t\t\t\"tempo\":\"".$timetotal."\"\n\t\t}");
            } else {
                fwrite($myfile, "\n\t\t{\n\t\t\t\"n_amostras\":\"".$n_amostra."\",\n\t\t\t\"tempo\":\"".$timetotal."\"\n\t\t},");
            }
            $n_amostra= $n_amostra + $salto;
        }
        fwrite($myfile, "\n\t]\n}");
        fclose($myfile);
            break;
        default:
            echo("opção irreconhecida, fim de programa.");
            break;
    }
    }



?>
            </div>
        </div>
        
        <script src="script.js"></script>
        <script type="text/javascript" src="data.json"></script>
</body>
</html>
