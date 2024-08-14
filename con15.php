<?php

// 浅いコピーの例
$array1 = [
    'key1' => [
        'subkey1' => 'value1',
    ],
];

$array2 = &$array1; // 浅いコピー

$array2['key1']['subkey1'] = 'new value';
print_r($array1); // $array1['key1']['subkey1'] も 'new value' に変更される

// 深いコピーの例
// $array3 = unserialize(serialize($array1)); // 深いコピー
// $array3['key1']['subkey1'] = 'another value';
// print_r($array1); // $array1 は変更されない
