<?php
function mergeSort($arr) {
    if (count($arr) <= 1) {
        return $arr;
    }

    // 配列を2つに分割
    $mid = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    // 再帰的にソート
    $left = mergeSort($left);
    $right = mergeSort($right);

    // マージしてソートされた配列を返す
    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $i = 0;
    $j = 0;

    // 左右の配列をマージ
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $result[] = $left[$i++];
        } else {
            $result[] = $right[$j++];
        }
    }

    // 残りの要素を追加
    while ($i < count($left)) {
        $result[] = $left[$i++];
    }

    while ($j < count($right)) {
        $result[] = $right[$j++];
    }

    return $result;
}

// テスト用の配列
$arr = [38, 27, 43, 3, 9, 82, 10];
$sortedArr = mergeSort($arr);

echo "ソートされた配列: " . implode(", ", $sortedArr) . "\n";
