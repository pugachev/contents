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

for($i=0;$i<$N;$i++){
    $start = $workinglist[$i][0];
    $end = $workinglist[$i][1];

    if($start <= $current_end+1){
        // 今回のスタート日が前回の範囲の中に入っている
        $current_end = max($current_end,$end);
        echo 'debug0 '.$start.' '.$end.' '.$current_start.' '.$current_end.' '.$max_days.PHP_EOL;
    }else{
        // 今回のスタートが前回の範囲の外にある場合
        $max_days = $end - $start + 1;
        $current_start = $start;
        $current_end = $end;
        echo 'debug1 '.$start.' '.$end.' '.$current_start.' '.$current_end.' '.$max_days.PHP_EOL;
    }
}
echo 'debug2 '.$max_days.' '.($current_end - $current_start + 1).PHP_EOL;
echo max($max_days,($current_end-$current_start+1));