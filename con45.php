<?php

// 日数:n日 キャンペーン日数:k日
fscanf(STDIN, "%d %d", $n, $k);

// 訪問人数
$people = [];
$input_line = trim(fgets(STDIN));
$parts = explode(" ", $input_line);
for($i=0;$i<count($parts);$i++){
    $people[]=$parts[$i];
}

// 候補日
$candidatearray = [];
// 最大平均値
$avgmax = 0;

for($i=0;$i<=$n-$k;$i++){
    $tmparray = array_slice($people,$i,$k);
    $tmpsum = array_sum($tmparray);
    $tmpavg = $tmpsum/$k;
    
    if($tmpavg > $avgmax){
        $avgmax = $tmpavg;
        $candidatearray= [$parts[$i]];
    }
}

echo count($candidatearray).' '.min($candidatearray).PHP_EOL;

