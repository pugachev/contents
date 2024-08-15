<?php

// 標準入力からのデータ読み取り
fscanf(STDIN, "%d %d %d %d %d", $N, $H, $W, $P, $Q);

// 予約済みの席の情報を格納する配列
$reservedSeats = [];
for ($i = 0; $i < $N; $i++) {
    fscanf(STDIN, "%d %d", $p, $q);
    $reservedSeats[] = [$p, $q];
}

// print_r($reservedSeats);

// 最小のマンハッタン距離を無限大に設定
$minDistance = PHP_INT_MAX;

// 最も見やすい席とマンハッタン距離が最小の未予約席を格納する配列
$bestSeats = [];

// 全ての席をチェック
for ($i = 0; $i < $H; $i++) {
    for ($j = 0; $j < $W; $j++) {
        // 既に予約されているかどうかを確認
        $isReserved = false;
        foreach ($reservedSeats as $seat) {
            if ($seat[0] == $i && $seat[1] == $j) {
                $isReserved = true;
                break;
            }
        }

        // 予約されていない場合
        if (!$isReserved) {
            // マンハッタン距離を計算
            $distance = abs($P - $i) + abs($Q - $j);
            echo 'debug0 '.$i.' '.$j.PHP_EOL;
            // 現在の最小距離よりも小さい場合、新しい最小距離に更新
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $bestSeats = [[$i, $j]];//この段階で初めて多次元配列を作成
                echo 'debug1 '.$i.' '.$j.PHP_EOL;
            } elseif ($distance == $minDistance) {
                // 同じ距離の座席がある場合、配列に追加
                $bestSeats[] = [$i, $j];
                echo 'debug2 '.$i.' '.$j.PHP_EOL;
            }
        }
    }
}

// 結果を出力
foreach ($bestSeats as $seat) {
    echo '答え '.$seat[0] . " " . $seat[1] . "\n";
}

?>
