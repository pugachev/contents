<?php
fscanf(STDIN, "%d %d %d", $H, $W,$D);

$bingomatrix = array_fill(0, $H, array_fill(0, $W, 0));
for($i=0;$i<$H;$i++){
    for($j=0;$j<$W;$j++){
        $bingomatrix[$i][$j] = 0;
    }
}

// 結果格納配列
$result = [];

switch($direction){

    case 1:
        // 左端上→下 左下→右上

        break;

    case 2:
        // 左端 左→右 を 上→下

        break;

    case 3:
        // 上端 右→左 各列を上→下
        break;

    case 4:
        // 上端 左→右 右上→左下
        break;

    default:
        break;

}