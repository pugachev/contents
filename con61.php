<?php

$array = [
    [100, 200, 20],
    [100, 20, 20],
    [500, 20, 20],
];

$rows = count($array);
$cols = count($array[0]);

// 左下から右上へ
echo "左下から右上へ:\n";
for ($d = 0; $d < $rows + $cols - 1; $d++) {
    $rowStart = max(0, $d - $cols + 1);
    $colStart = min($d, $cols - 1);

    

    while ($rowStart < $rows && $colStart >= 0) {
        echo $array[$rowStart][$colStart] . " ";
        $rowStart++;
        $colStart--;
    }
    echo "\n";
}
