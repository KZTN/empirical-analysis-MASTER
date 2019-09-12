<?php
function insertionSort(&$v) {
    for ($i=1; $i < count($v) ; $i++) { 
        for ($j=$i; $j > 0 && $v[$j - 1] > $v[$j] ; $j--) { 
            $aux = $v[$j];
            $v[$j] = $v[$j-1];
            $v[$j-1] = $aux;
        }
    }
}
function mergeSort(&$array) {
    $arrayLength = count($array);
    if ($arrayLength > 1) {
        $arrayLeft = array_slice($array, 0, $arrayLength/2);
        $arrayRight = array_slice($array, $arrayLength/2);
        $arrayLeft = mergeSort($arrayLeft);
        $arrayRight = mergeSort($arrayRight);
        $left = 0;
        $right = 0;
        $insert = 0;
        while ($left < count($arrayLeft) and $right < count($arrayRight)){
            if ($arrayLeft[$left] < $arrayRight[$right]) {
                $array[$insert] = $arrayLeft[$left];
                $left += 1;
            } else {
                $array[$insert] = $arrayRight[$right];
                $right += 1;
            }
            $insert += 1;
        }
        while ($left < count($arrayLeft)) {
            $array[$insert] = $arrayLeft[$left];
            $left += 1;
            $insert += 1;
        }
        while ($right < count($arrayRight)) {
            $array[$insert] = $arrayRight[$right];
            $right += 1;
            $insert += 1;
        }       
    }
    return $array;

}  

?>