<?php

// $input = ["a", "b", "c", "d", "e"];
// $output = array_slice($input, 0,3);
// print_r($output);
// echo "---".PHP_EOL;
// print_r($input);


$array = [
    [13, 3, 9],
    [8, 0, 2],
    [16, 17, 15]
];

$target = 16; // 検索する値
$position = null;

// 配列をループして、目的の値を探す
foreach ($array as $rowIndex => $row) {
    echo 'rowIndex='.$rowIndex.PHP_EOL;
    foreach ($row as $colIndex => $value) {
        echo 'colIndex='.$colIndex.PHP_EOL;
        if ($value == $target) {
            echo $array[$rowIndex][$colIndex].PHP_EOL;
            // $position = ['row' => $rowIndex, 'col' => $colIndex];
            break 2; // 値が見つかったらループを終了
        }
    }
}

// if ($position !== null) {
//     echo "値 $target は行 {$position['row']}, 列 {$position['col']} にあります。";
// } else {
//     echo "値 $target は配列内に存在しません。";
// }