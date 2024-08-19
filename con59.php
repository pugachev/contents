<?php

// 人数:N人 課題曲の長さ:M個
fscanf(STDIN, "%d %d", $N, $M);

// 課題曲の長さ分 正解をうけとる
$seikai = [];
for($i=0;$i<$M;$i++){
    fscanf(STDIN, "%d", $m);
    $seikai[] = $m;
}

// 人数分の記録を受け取る
$record = array_fill(0, $N, array_fill(0, 2, 0));
for($i=0;$i<$N;$i++){
    for($j=0;$j<$M;$j++){
        fscanf(STDIN, "%d", $m);
        $record[$i][$j] = $m;
    }
}

$max = -1;
$result = array_fill(0, $N,0);

// 正解との差分をとる
for($i=0;$i<$N;$i++){
    $tempScore = 100;
    for($j=0;$j<$M;$j++){
        $diff = abs($record[$i][$j]-$seikai[$j]);
        if($diff <= 5 ){
            // 減点なし
        }else if(5 < $diff && $diff <=10){
            // -1
            $tempScore -= 1;
        }else if(10 < $diff && $diff <=20){
            // -2
            $tempScore -= 2;
        }else if(20 < $diff && $diff <=30){
            // -3
            $tempScore -= 3;
        }else if(30 < $diff){
            // -5
            $tempScore -= 5;
        }   
    }

    if($tempScore < 0){
        $tempScore=0;
    }
    $result[$i] = $tempScore;

}

echo max($result);