<?php

// ビンゴ表の縦横:N 抽選回数:K
fscanf(STDIN, "%d %d", $N, $K);

// ビンゴ表の各行の数値
$bingomatrix = [$N][$N];

for($i=0;$i<$N;$i++){
    $input_line = trim(fgets(STDIN));
    $parts = explode(" ", $input_line);
    for($j=0;$j<$N;$j++){
        $bingomatrix[$i][$j] = $parts[$j];
    }
}


// 対象の数値を格納する
$bingonumbers = [];
$input_line = trim(fgets(STDIN));
$parts = explode(" ", $input_line);
for($j=0;$j<$K;$j++){
    $bingonumbers[] = $parts[$j];
}

// 該当する数値を100にした後に3個連続してるかを調べる方法とする
for($i=0;$i<count($bingonumbers);$i++){
    // 配列をループして、目的の値を探す
    foreach ($bingomatrix as $rowIndex => $row) {
        foreach ($row as $colIndex => $value) {
            if ($value == $bingonumbers[$i]) {
                $bingomatrix[$rowIndex][$colIndex]=999;
            }
            if($value == 0){
                $bingomatrix[$rowIndex][$colIndex]=999;
            }
        }
    }
}

function check_hitcnt($array, $target) {
    $N = count($array); // 配列のサイズを取得
    $hitcnt = 0;

    // 横方向のチェック
    for ($i = 0; $i < $N; $i++) {
        $row_win = true;
        for ($j = 0; $j < $N; $j++) {
            if ($array[$i][$j] != $target) {
                $row_win = false;
                break;
            }
        }
        if ($row_win) {
            $hitcnt += 1;
            break;
        }
    }

    // 縦方向のチェック
    for ($i = 0; $i < $N; $i++) {
        $col_win = true;
        for ($j = 0; $j < $N; $j++) {
            if ($array[$j][$i] != $target) {
                $col_win = false;
                break;
            }
        }
        if ($col_win) {
            $hitcnt += 1;
            break;
        }
    }

    // 左上から右下への斜めチェック
    $diag1_win = true;
    for ($i = 0; $i < $N; $i++) {
        if ($array[$i][$i] != $target) {
            $diag1_win = false;
            break;
        }
    }
    if ($diag1_win) {
        $hitcnt += 1;
    }

    // 右上から左下への斜めチェック
    $diag2_win = true;
    for ($i = 0; $i < $N; $i++) {
        if ($array[$i][$N - $i - 1] != $target) {
            $diag2_win = false;
            break;
        }
    }
    if ($diag2_win) {
        $hitcnt += 1;
    }

    return $hitcnt;
}


echo check_hitcnt($bingomatrix,999).PHP_EOL;

