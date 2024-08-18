<?php

// 人数:N 単語数:K 発言数:M
fscanf(STDIN, "%d %d %d", $N, $K, $M);

// 人物リスト
$manlist = range(1, $N);

// 単語リスト
$wordlist = [];
for ($i = 0; $i < $K; $i++) {
    fscanf(STDIN, "%s", $word);
    $wordlist[] = $word;
}

// 発言リスト
$commentlist = [];
for ($i = 0; $i < $M; $i++) {
    fscanf(STDIN, "%s", $comment);
    $commentlist[] = $comment;
}

// 発言された単語の記録
$usedWords = [];
$outmanlist = [];
$previousPlayerOut = false;

for ($j = 0; $j < count($commentlist); $j++) {
    $currentPlayer = $j % $N + 1;

    // すでに脱落したプレイヤーは無視する
    if (in_array($currentPlayer, $outmanlist)) {
        continue;
    }

    $currentWord = $commentlist[$j];

    // 単語リストに存在しない単語
    if (!in_array($currentWord, $wordlist)) {
        $outmanlist[] = $currentPlayer;
        $previousPlayerOut = true;
        continue;
    }

    // 既に使われた単語かどうか
    if (in_array($currentWord, $usedWords)) {
        $outmanlist[] = $currentPlayer;
        $previousPlayerOut = true;
        continue;
    }

    // zで終わる単語
    if (substr($currentWord, -1) == 'z') {
        $outmanlist[] = $currentPlayer;
        $previousPlayerOut = true;
        continue;
    }

    // 前回の単語の最後の文字と一致しているか（ただし、直前のプレイヤーが脱落していない場合のみ適用）
    if (!$previousPlayerOut && $j > 0) {
        $previousWord = $commentlist[$j - 1];
        if (substr($previousWord, -1) != substr($currentWord, 0, 1)) {
            $outmanlist[] = $currentPlayer;
            $previousPlayerOut = true;
            continue;
        }
    }

    // プレイヤーが脱落しなかった場合、次のプレイヤーに対してルール2が適用される
    $previousPlayerOut = false;

    // 単語を使用済みとして記録
    $usedWords[] = $currentWord;
}

// 脱落者リストのユニーク化
$outmanlist = array_unique($outmanlist);

// 残ったプレイヤーをリストアップ
$safelist = array_diff($manlist, $outmanlist);

echo count($safelist) . PHP_EOL;
foreach ($safelist as $safePlayer) {
    echo $safePlayer . PHP_EOL;
}
