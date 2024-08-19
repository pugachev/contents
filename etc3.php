<?php

// $tgt = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
// $N = count($tgt); // 配列の要素数
// $shift = 3; // 右に進める個数

// // 新しい配列を初期化
// $result = array_fill(0, $N, 0);

// // 各要素を右側に進める
// for ($i = 0; $i < $N; $i++) {
//     // 新しいインデックスを計算
//     $newIndex = ($i + $shift) % $N;
//     echo $i.' '.$newIndex.PHP_EOL;
//     $result[$newIndex] = $tgt[$i];
// }

// // 結果を出力
// print_r($result);


$votes = ["Option A", "Option B", "Option A", "Option C", "Option A", "Option B"];

$result = array_count_values($votes);

foreach ($result as $option => $count) {
    echo "$option was selected $count times.\n";
}