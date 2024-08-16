<?php

function divide($array) {
    if (count($array) <= 1) {
        return $array;
    }
    $middle = count($array) / 2;
    $leftArray = array_slice($array, 0, $middle);
    $rightArray = array_slice($array, $middle);

    // 再帰的に左と右の配列を分割してソート
    $leftArray = divide($leftArray);
    $rightArray = divide($rightArray);

    // 分割された配列をマージして戻す
    return merge($leftArray, $rightArray);
}

function merge($leftArray, $rightArray) {
    $result = [];
    while (count($leftArray) > 0 && count($rightArray) > 0) {
        // 左右の配列の先頭要素を比較し、より小さい方を結果配列に追加
        if ($leftArray[0] <= $rightArray[0]) {
            $result[] = array_shift($leftArray);
        } else {
            $result[] = array_shift($rightArray);
        }
    }

    // 残った要素を結果配列に追加
    return array_merge($result, $leftArray, $rightArray);
}

// 使用例
$array = [38, 27, 43, 3, 9, 82, 10];
$sortedArray = divide($array);
print_r($sortedArray);
