<?php

// $fruits = ["apple", "banana", "cherry"];

// if (in_array("banana", $fruits)) {
//     echo "Banana is in the array!";
// } else {
//     echo "Banana is not in the array.";
// }


// 元の配列
// $array = [2, 1, 1, 2, 3, 3,4,4,4];

// $count = array_count_values($array)[4];

// print_r($count);

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

// function mergeSortAndCount(&$arr) {
//     $n = count($arr);
//     $invCount = 0;

//     // サブ配列のサイズを1から徐々に大きくする
//     for ($curr_size = 1; $curr_size <= $n - 1; $curr_size = 2 * $curr_size) {
//         // 左側の部分配列の開始点を決定する
//         for ($left_start = 0; $left_start < $n - 1; $left_start += 2 * $curr_size) {
//             // マージする2つの部分配列の右側の開始点と終了点
//             $mid = min($left_start + $curr_size - 1, $n - 1);
//             $right_end = min($left_start + 2 * $curr_size - 1, $n - 1);

//             // マージして逆順数をカウント
//             $invCount += mergeAndCount($arr, $left_start, $mid, $right_end);
//         }
//     }

//     return $invCount;
// }

// function mergeAndCount(&$arr, $l, $m, $r) {
//     $left = array_slice($arr, $l, $m - $l + 1);
//     $right = array_slice($arr, $m + 1, $r - $m);

//     $i = 0;
//     $j = 0;
//     $k = $l;
//     $invCount = 0;

//     // 左右の配列をマージしながら逆順数をカウント
//     while ($i < count($left) && $j < count($right)) {
//         if ($left[$i] <= $right[$j]) {
//             $arr[$k++] = $left[$i++];
//         } else {
//             $arr[$k++] = $right[$j++];
//             $invCount += (count($left) - $i);
//         }
//     }

//     // 残りの要素をコピー
//     while ($i < count($left)) {
//         $arr[$k++] = $left[$i++];
//     }

//     while ($j < count($right)) {
//         $arr[$k++] = $right[$j++];
//     }

//     return $invCount;
// }

// // 入力の受け取り
// $n = intval(trim(fgets(STDIN)));
// $arr = [];
// for ($i = 0; $i < 2 * $n; $i++) {
//     $arr[] = intval(trim(fgets(STDIN)));
// }

// print_r($arr);
// // 目標の並びに並べ替えるための逆順数を計算
// $minSwaps = mergeSortAndCount($arr);

// echo $minSwaps . "\n";

