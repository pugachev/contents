<?php

$array = [
    [100, 200, 20],
    [100, 20, 20],
    [500, 20, 20],
];

// 横方向に出力する
for($i=0;$i<3;$i++){
    for($k=0;$k<3;$k++){
        echo $array[$i][$k].' ';
    }
    echo PHP_EOL;
}

echo "-----".PHP_EOL;

// 縦方向に出力する
for($i=0;$i<3;$i++){
    for($k=0;$k<3;$k++){
        echo $array[$k][$i].' ';
    }
    echo PHP_EOL;
}