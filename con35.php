<?php
// 標準入力からデータを読み込む
fscanf(STDIN, "%d %d", $n, $m);

// 座席の状態を表す配列を初期化（全ての座席が空いている状態）
$seats = array_fill(0, $n, false);

// 座れた人数をカウントする変数
$total_seated = 0;

for ($i = 0; $i < $m; $i++) {
    fscanf(STDIN, "%d %d", $a_i, $b_i);
    
    // グループが座りたい範囲を計算
    $start = $b_i - 1; // 0-indexedに変換
    $end = ($start + $a_i - 1) % $n;
    
    // 座席のチェック
    $can_seat = true;
    
    if ($start <= $end) {
        // 座席が連続している場合
        for ($j = $start; $j <= $end; $j++) {
            if ($seats[$j]) {
                $can_seat = false;
                break;
            }
        }
    } else {
        // 座席がテーブルを回り込む場合
        for ($j = $start; $j < $n; $j++) {
            if ($seats[$j]) {
                $can_seat = false;
                break;
            }
        }
        if ($can_seat) {
            for ($j = 0; $j <= $end; $j++) {
                if ($seats[$j]) {
                    $can_seat = false;
                    break;
                }
            }
        }
    }
    
    // 座れる場合は座席を埋める
    if ($can_seat) {
        if ($start <= $end) {
            for ($j = $start; $j <= $end; $j++) {
                $seats[$j] = true;
            }
        } else {
            for ($j = $start; $j < $n; $j++) {
                $seats[$j] = true;
            }
            for ($j = 0; $j <= $end; $j++) {
                $seats[$j] = true;
            }
        }
        $total_seated += $a_i;
    }
}

// 結果を出力
echo $total_seated . "\n";

