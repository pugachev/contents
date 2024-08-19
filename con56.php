<?php
function perfectShuffle($deck, $K) {
    $n = count($deck) / 2;
    for ($i = 0; $i < $K; $i++) {
        $shuffled = [];
        for ($j = 0; $j < $n; $j++) {
            $shuffled[] = $deck[$j];
            $shuffled[] = $deck[$j + $n];
        }
        $deck = $shuffled;
    }
    return $deck;
}

// 初期のデッキを定義
$deck = [];
$suits = ['S', 'H', 'D', 'C'];

foreach ($suits as $suit) {
    for ($i = 1; $i <= 13; $i++) {
        $deck[] = "{$suit}_{$i}";
    }
}

// シャッフル回数 K を指定
$K = intval(trim(fgets(STDIN)));

// パーフェクトシャッフルを K 回実行
$shuffledDeck = perfectShuffle($deck, $K);

// 結果を出力
foreach ($shuffledDeck as $card) {
    echo $card . "\n";
}

