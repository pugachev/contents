<?php

fscanf(STDIN, "%d %d %d", $N, $M,$K);


// 初期状態のカード配列を作成 (1からNまでの整数)
$cards = range(1, $N);

// K回シャッフルを繰り返す
for ($k = 0; $k < $K; $k++) {
    // 新しいカードの順番を格納する配列
    $new_order = [];

    // M枚ごとに分割し、逆順に並べ替える
    for ($i = 0; $i < $N; $i += $M) {
        $chunk = array_slice($cards, $i, $M);
        $new_order = array_merge($chunk, $new_order);
    }

    // 新しい順番を現在のカードの順番として設定
    $cards = $new_order;
}

// シャッフル後のカードを出力
foreach ($cards as $card) {
    echo $card . PHP_EOL;
}


