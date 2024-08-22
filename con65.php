<?php

// 仕事数
fscanf(STDIN, "%d", $N);

$workinglist = [];
// 仕事開始と終わりを取得
for($i=0; $i<$N; $i++){
    fscanf(STDIN, "%d %d", $S, $E);
    $workinglist[] = [$S, $E];
}

// 開始日でソートする
usort($workinglist, function($a, $b) {
    return $a[0] - $b[0];
});

$max_days = 0;
$current_start = $workinglist[0][0];
$current_end = $workinglist[0][1];

// 連続勤務日数を計算
for($i=1; $i<$N; $i++){
    $start = $workinglist[$i][0];
    $end = $workinglist[$i][1];
    
    if($start <= $current_end + 1) {
        
        // 連続している場合、終了日を更新
        $current_end = max($current_end, $end);
        echo 'debug0 '.$start.' '.$end.' '.$current_start.' '.$current_end.' '.$max_days.PHP_EOL;
    } else {
        
        // 連続が途切れたら、現在の連続勤務日数を記録
        $max_days = max($max_days, $current_end - $current_start + 1);
        // 新たな連続勤務期間を開始
        $current_start = $start;
        $current_end = $end;
        echo 'debug1 '.$start.' '.$end.' '.$current_start.' '.$current_end.' '.$max_days.PHP_EOL;
    }
}

// 最後の連続勤務期間を考慮
echo 'debug2 '.$max_days.' '.($current_end - $current_start + 1).PHP_EOL;

$max_days = max($max_days, $current_end - $current_start + 1);

echo $max_days . PHP_EOL;
