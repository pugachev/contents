<?php

// 日数:n日 キャンペーン日数:k日
fscanf(STDIN, "%d %d", $n, $k);

// 訪問人数
$people = [];
$input_line = trim(fgets(STDIN));
$parts = explode(" ", $input_line);
for($i=0;$i<count($parts);$i++){
    $people[] = (int)$parts[$i];  // 入力を整数にキャスト
}

// 候補日
$candidatearray = [];
// 最大平均値
$avgmax = -1;  // 初期値を最小の平均とする

for($i=0;$i<=$n-$k;$i++){
    $tmparray = array_slice($people, $i, $k);
    $tmpsum = array_sum($tmparray);
    $tmpavg = $tmpsum / $k;
    
    if($tmpavg > $avgmax){
        $avgmax = $tmpavg;
        $candidatearray = [$i + 1];  // 開始日を保存（1-indexed）
        echo "その1".PHP_EOL;
        print_r($candidatearray);
    } elseif ($tmpavg == $avgmax) {
        $candidatearray[] = $i + 1;  // 同じ平均値なら候補として追加
        echo "その2".PHP_EOL;
        print_r($candidatearray);
    }
}

echo count($candidatearray).' '.min($candidatearray).PHP_EOL;
