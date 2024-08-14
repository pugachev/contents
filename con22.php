<?php
// ビンゴカードのサイズ (通常は5x5)
define('BINGO_SIZE', 5);

// ビンゴカードを生成する関数
function generateBingoCard() {
    $card = [];
    
    // 各列の範囲 (B列は1-15, I列は16-30, ... O列は61-75)
    $columnRanges = [
        'B' => range(1, 15),
        'I' => range(16, 30),
        'N' => range(31, 45),
        'G' => range(46, 60),
        'O' => range(61, 75)
    ];
    
    foreach ($columnRanges as $key => $range) {
        shuffle($range); // 数字をランダムに並べ替える
        for ($i = 0; $i < BINGO_SIZE; $i++) {
            $card[$i][$key] = array_shift($range); // ランダムに選ばれた数をカードに配置
        }
    }

    // 真ん中のセルは通常「FREE」スペース
    $card[2]['N'] = 'FREE';

    return $card;
}

// ビンゴカードを表示する関数
function printBingoCard($card) {
    echo "<table border='1' style='text-align:center; width:200px;'>\n";
    echo "<tr><th>B</th><th>I</th><th>N</th><th>G</th><th>O</th></tr>\n";

    for ($i = 0; $i < BINGO_SIZE; $i++) {
        echo "<tr>";
        foreach (['B', 'I', 'N', 'G', 'O'] as $column) {
            echo "<td>" . $card[$i][$column] . "</td>";
        }
        echo "</tr>\n";
    }
    
    echo "</table>\n";
}

// ビンゴカードを生成して表示
$bingoCard = generateBingoCard();
printBingoCard($bingoCard);