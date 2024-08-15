<?php

// 逆順数を計算するための関数（マージソートを使用）
function mergeSortAndCount(&$arr, $l, $r) {
    $invCount = 0;
    if ($l < $r) {
        $m = floor(($l + $r) / 2);

        // 左半分の逆順数を計算
        $invCount += mergeSortAndCount($arr, $l, $m);

        // 右半分の逆順数を計算
        $invCount += mergeSortAndCount($arr, $m + 1, $r);

        // 左右をマージして逆順数を計算
        $invCount += mergeAndCount($arr, $l, $m, $r);
    }
    return $invCount;
}

function mergeAndCount(&$arr, $l, $m, $r) {
    $left = array_slice($arr, $l, $m - $l + 1);
    $right = array_slice($arr, $m + 1, $r - $m);

    $i = 0;
    $j = 0;
    $k = $l;
    $invCount = 0;

    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $arr[$k++] = $left[$i++];
        } else {
            $arr[$k++] = $right[$j++];
            $invCount += (count($left) - $i);
        }
    }

    while ($i < count($left)) {
        $arr[$k++] = $left[$i++];
    }

    while ($j < count($right)) {
        $arr[$k++] = $right[$j++];
    }

    return $invCount;
}

// 入力の受け取り
$n = intval(trim(fgets(STDIN)));
$arr = [];
for ($i = 0; $i < 2 * $n; $i++) {
    $arr[] = intval(trim(fgets(STDIN)));
}

// 目標の並びに並べ替えるための逆順数を計算
$minSwaps = mergeSortAndCount($arr, 0, count($arr) - 1);

echo $minSwaps . "\n";
