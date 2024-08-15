<?php

// $array = [1, 2, 3, 4, 5];

// $center = floor(count($array)/2);
// $sliced_array1 = array_slice($array,0,$center);
// $sliced_array2 = array_slice($array,$center);

// print_r($center);
// echo PHP_EOL;
// print_r($sliced_array1);
// print_r($sliced_array2);

// function recursiveSplit($array) {
//     // 配列の要素が1つだけなら、それが最小単位
//     if (count($array) <= 1) {
//         return $array;
//     }

//     // 配列を2つに分割
//     $middle = floor(count($array) / 2);
//     $leftArray = array_slice($array, 0, $middle);
//     $rightArray = array_slice($array, $middle);
//     echo "middle=".$middle.PHP_EOL;

//     // 再帰的に分割を続ける
//     $leftArray = recursiveSplit($leftArray);
//     $rightArray = recursiveSplit($rightArray);

//     // 最終的に分割された配列を返す
//     return array_merge($leftArray, $rightArray);
// }

// // 使用例
// $array = [4, 3, 2, 1];
// recursiveSplit($array);
// print_r(recursiveSplit($array));

function divide($array) {
    if(count($array) <= 1) {
        return $array;
    }

    $middle = count($array) / 2;
    $leftArray = array_slice($array, 0, $middle);
    $rightArray = array_slice($array, $middle);

    echo "その1 Left: " . implode(", ", $leftArray) . "\n";
    echo "その1 Right: " . implode(", ", $rightArray) . "\n";

    $leftArray = divide($leftArray);//27
    $rightArray = divide($rightArray);//43 

    echo "merge前 Left: " . implode(", ", $leftArray) . "\n";
    echo "merge前 Right: " . implode(", ", $rightArray) . "\n";

    return array_merge($leftArray, $rightArray);
}

$array = [38, 27, 43, 3, 9, 82, 10];
divide($array);
