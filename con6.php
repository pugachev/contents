<?php

function findMinMax($numbers){
    $min=min($numbers);
    $max=max($numbers);
    // 値を２つ返す方法のチェック
    return [$min,$max];
}


$numbers = [10, 5, 3, 8, 2];

list($min,$max) = findMinMax($numbers);

echo " min=".$min.'max='.$max;

// $ret = findMinMax($numbers);
// $parts = explode("_",$ret);


// echo "min=".$parts[0]." max=".$parts[1];