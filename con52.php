<?php

fscanf(STDIN, "%d %d", $H, $W);

$bingomatrix = array_fill(0, $H, array_fill(0, $W, 0));
for($i=0;$i<$H;$i++){
    $input_line = trim(fgets(STDIN));
    $parts = str_split($input_line);
    for($j=0;$j<$W;$j++){
        $bingomatrix[$i][$j] = $parts[$j];
    }
}

fscanf(STDIN, "%d %d", $y, $x); // 座標は (y, x) の順
// 与えられた座標のマスと上下左右で隣接するマスの最大 5 マス
// 対象ずばり
if($bingomatrix[$y][$x]=="."){
    $bingomatrix[$y][$x]="#";
}else if($bingomatrix[$y][$x]=="#"){
    $bingomatrix[$y][$x]=".";
}
// 対象の上 
if(isset($bingomatrix[$y-1][$x])){
    if($bingomatrix[$y-1][$x]=="."){
        $bingomatrix[$y-1][$x]="#";
    }else if($bingomatrix[$y-1][$x]=="#"){
        $bingomatrix[$y-1][$x]=".";
    }
}
// 対象の下 
if(isset($bingomatrix[$y+1][$x])){
    if($bingomatrix[$y+1][$x]=="."){
        $bingomatrix[$y+1][$x]="#";
    }else if($bingomatrix[$y+1][$x]=="#"){
        $bingomatrix[$y+1][$x]=".";
    }
}
// 対象の右
if(isset($bingomatrix[$y][$x+1])){
    if($bingomatrix[$y][$x+1]=="."){
        $bingomatrix[$y][$x+1]="#";
    }else if($bingomatrix[$y][$x+1]=="#"){
        $bingomatrix[$y][$x+1]=".";
    }
}
// 対象の左
if(isset($bingomatrix[$y][$x-1])){
    if($bingomatrix[$y][$x-1]=="."){
        $bingomatrix[$y][$x-1]="#";
    }else if($bingomatrix[$y][$x-1]=="#"){
        $bingomatrix[$y][$x-1]=".";
    }
}


for($i=0;$i<$H;$i++){
    for($j=0;$j<$W;$j++){ // 列数 W までループ
        echo $bingomatrix[$i][$j];
    }
    echo PHP_EOL;
}