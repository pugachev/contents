<?php
// function arraySum($array) {
//     if (count($array) == 0) { // ベースケース: 配列が空の場合
//         return 0;
//     }
//     return array_pop($array) + arraySum($array); // 再帰ステップ
// }

$tgt=[10,30,25];
// echo arraySum($tgt);

echo array_pop($tgt);
print_r($tgt);