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
if($bingomatrix[$y][$x]=="."){
    $bingomatrix[$y][$x]="#";
}else if($bingomatrix[$y][$x]=="#"){
    $bingomatrix[$y][$x]=".";
}

for($i=0;$i<$H;$i++){
    for($j=0;$j<$W;$j++){ // 列数 W までループ
        echo $bingomatrix[$i][$j];
    }
    echo PHP_EOL;
}