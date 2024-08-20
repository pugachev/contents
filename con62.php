<?php
// 画面から数字列を取得する
$input_line = trim(fgets(STDIN));
$disparray = str_split($input_line);


$matrixcnt = count($disparray);
$matrixarray=[];
for($i=0;$i<$matrixcnt;$i++){
    $matrix = array_fill(0, 3, array_fill(0, 3, '.'));  // 3x3の '.' のグリッドを作成
    for($k=0;$k<$disparray[$i];$k++){
        $row = intval($k / 3);  // 行のインデックス
        $col = $k % 3;  // 列のインデックス
        $matrix[$row][$col] = '#';  // '#'をセット
    }
    $matrixarray[] = $matrix;  // グリッドを配列に追加
}

for($row=0; $row<3; $row++) {
    for($i=0; $i<$matrixcnt; $i++) {
        for($col=0; $col<3; $col++) {
            echo $matrixarray[$i][$row][$col];
        }
        if (($i+1) % 3 == 0) {
            echo PHP_EOL;  // 3つのグリッドを表示したら改行
        }
    }
    echo PHP_EOL;
}



