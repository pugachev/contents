<?php
function mergeSort(&$array, $left, $right) {
    if ($left < $right) {
        // 中央の位置を計算
        $center = intval(($left + $right) / 2);

        // 左半分をソート
        mergeSort($array, $left, $center);
        // 右半分をソート
        mergeSort($array, $center + 1, $right);

        // 両半分をマージ
        merge($array, $left, $center, $right);
    }
}

function merge(&$array, $left, $center, $right) {
    $tempArray = [];
    $leftIndex = $left;
    $rightIndex = $center + 1;

    // 両半分を比較しながら$tempArrayにマージ
    while ($leftIndex <= $center && $rightIndex <= $right) {
        if ($array[$leftIndex] < $array[$rightIndex]) {
            $tempArray[] = $array[$leftIndex++];
        } else {
            $tempArray[] = $array[$rightIndex++];
        }
    }

    // 残った要素をマージ
    while ($leftIndex <= $center) {
        $tempArray[] = $array[$leftIndex++];
    }
    while ($rightIndex <= $right) {
        $tempArray[] = $array[$rightIndex++];
    }

    // 元の配列にコピー
    for ($i = $left; $i <= $right; $i++) {
        $array[$i] = $tempArray[$i - $left];
    }
}

// 使用例
$list = [54, 26, 93, 17, 77, 31, 44, 55, 20];
mergeSort($list, 0, count($list) - 1);
print_r($list); // ソートされた配列が出力される
