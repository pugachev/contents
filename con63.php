<?php

// 画面から数字列を取得する
$input_line = trim(fgets(STDIN));
$disparray = str_split($input_line);

$matrixcnt = count($disparray);
$matrixarray = [];
for($i = 0; $i < $matrixcnt; $i++){
    $matrixarray[$i] = []; // 3x3の配列を初期化
    for($j = 0; $j < 3; $j++){
        $matrixarray[$i][$j] = array_fill(0, 3, '.'); 
    }
}

for($j = 0; $j < $matrixcnt; $j++){
    for($k = 0; $k < $disparray[$j]; $k++){
        $row = floor($k / 3); // 0-index based
        $col = $k % 3;
        $matrixarray[$j][$row][$col] = "#";
    }
}

// 3個ずつ並べる
for($i = 0; $i < $matrixcnt; $i += 3){
    for($row = 0; $row < 3; $row++){
        for($j = $i; $j < $i + 3 && $j < $matrixcnt; $j++){
            for($col = 0; $col < 3; $col++){
                echo $matrixarray[$j][$row][$col];
            }
            echo " "; // グリッド間のスペース
        }
        echo "\n";
    }
}