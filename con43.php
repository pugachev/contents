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
<?php

// トランプの縦・横・人数を格納する
fscanf(STDIN, "%d %d %d", $h, $w, $n);

// トランプを作成する
$cardmatrix = [];
for ($i = 0; $i < $h; $i++) {
    for ($j = 0; $j < $w; $j++) {
        $cardmatrix[$i][$j] = null;
    }
}

// トランプのカードデータを格納する
for ($i = 0; $i < $h; $i++) {
    $input_line = trim(fgets(STDIN));  // 文字列として入力を読み込む
    $parts = explode(" ", $input_line);  // 空白で分割して配列にする
    for ($j = 0; $j < $w; $j++) {
        $cardmatrix[$i][$j] = intval($parts[$j]);  // 各値を整数に変換して格納する
    }
}

// カードの展開履歴(h,w) 一度の2回はひくので2組(4個)が入力される
$hisarray = [];
fscanf(STDIN, "%d", $his);
for($i=0;$i < $his;$i++){
    $input_line = trim(fgets(STDIN));  // 文字列として入力を読み込む
    $parts = explode(" ", $input_line);  // 空白で分割して配列にする
    $hisarray[] = [$parts[0],$parts[1],$parts[2],$parts[3]];
}

// $winnerList = [];
$winnerList = array_fill(0, $n, 0);
$currentUser = 0;
$isHitUser = true;
for($i=0;$i < count($hisarray);$i++){
    $firstCardNum = $cardmatrix[$hisarray[$i][0]-1][$hisarray[$i][1]-1];
    $secontrCardNum = $cardmatrix[$hisarray[$i][2]-1][$hisarray[$i][3]-1];
    // 当たりの場合
    if($firstCardNum == $secontrCardNum){
        $isHitUser = true;
        $winnerList[$currentUser] += 2;
        // cardmatrixから該当データを消す
        $cardmatrix[$hisarray[$i][0]-1][$hisarray[$i][1]-1] = null;
        $cardmatrix[$hisarray[$i][2]-1][$hisarray[$i][3]-1] = null;
    }else{
        $isHitUser = false;
    }

    if(!$isHitUser){
        $currentUser = ($currentUser + 1) % $n;
        $isHitUser = true;
    }
}

for($i=0;$i < count($winnerList);$i++){
    echo $winnerList[$i].PHP_EOL;
}


