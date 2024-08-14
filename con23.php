<?php

// 配列を定義
$array = [10, 20, 30, 40, 50];

// 2つずつの合計を保存するための配列
$avg = [];

// 配列の要素を前から2つずつ足す
for ($i = 0; $i < count($array) - 1; $i++) {
    $sum = $array[$i] + $array[$i + 1];
    echo $i.PHP_EOL;
    $avg[] = $sum/2;
}

print_r($avg);

