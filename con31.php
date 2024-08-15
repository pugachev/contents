<?php

// // 入力データの読み込み
// fscanf(STDIN, "%d", $N);
// $flowers = [];
// for ($i = 0; $i < 2 * $N; $i++) {
//     fscanf(STDIN, "%d", $flowers[$i]);
// }

// // 目標の並びを作成
// $target = [];
// for ($i = 0; $i < $N; $i++) {
//     $target[] = $i + 1;
// }
// $target = array_merge($target, $target);

// // 交換回数の計算
// $swapCount = 0;
// for ($i = 0; $i < 2 * $N; $i++) {
//     $color = $flowers[$i];
//     // color が target の中で最初に現れるインデックスを探す
//     $targetIndex = array_search($color, $target);
//     // color が 2 回目に現れるインデックスを探す
//     $secondTargetIndex = array_search($color, array_slice($target, $targetIndex + 1)); + $targetIndex + 1;

//     // どちらの targetIndex に移動させるのが近いかを計算
//     $distance = min(abs($i - $targetIndex), abs($i - $secondTargetIndex));
//     $swapCount += floor($distance / 2); 

//     // 移動済みの color を target から削除
//     unset($target[$targetIndex]);
//     unset($target[$secondTargetIndex]);
//     $target = array_values($target); // インデックスを詰め直す
// }

// // 結果の出力
// echo $swapCount . PHP_EOL;

function countSwaps($current, $target) {
    $n = count($current);
    $swaps = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if (array_search($current[$i], $target) > array_search($current[$j], $target)) {
                $swaps++;
            }
        }
    }
    return $swaps;
}

$current = [2, 1, 1, 2, 3, 3];
$target = [1, 2, 3, 1, 2, 3];

echo countSwaps($current, $target);