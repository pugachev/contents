<?php
function sumArray($num){
    $sum=0;
    foreach($num as $val){
        $sum += $val;
    }

    return $sum;
}

$numbers = [1, 2, 3, 4, 5];

echo sumArray($numbers);