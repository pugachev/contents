<?php
// 2つの配列の共通部分

$array1 = [1, 2, 3, 4, 5];
$array2 = [4, 5, 6, 7, 8];

function findIntersection($arr1,$arr2){
    return array_values(array_intersect($arr1,$arr2));
}


print_r(findIntersection($array1,$array2));
