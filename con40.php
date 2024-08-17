<?php

// 人数:N 単語数:K 発言数:M
fscanf(STDIN, "%d %d %d", $N,$K,$M);

// 人物リスト
$manlist = [];
for($i=0;$i<$N;$i++){
    $manlist[] = $i;
}

print_r($manlist);

// 単語リスト
$wordlist = [];
for ($i = 0; $i < $K; $i++) {
    fscanf(STDIN, "%s", $word);
    $wordlist[] = $word;// 単語を登録する
}

// 発言リスト
$commentlist = [];
for ($i = 0; $i < $M; $i++) {
    fscanf(STDIN, "%s", $comment);
    $commentlist[] = $comment;// 単語を登録する
}
// print_r($commentlist);
// 判定処理
// 1. 前回の単語の最後尾の文字を今回の文字の先頭文字として使用しているか？
// 1-1. 初回の発言者は無関係
// 2. 前回と同じ文字列を使用していないか？
// 2-1  直前の人がルール2を理由に外れた場合、次の人はこのルールは適用外となる
// 3  単語の修理文字がzを使ってはいけない
// 発言者とコメントの紐づけ方をどうするか？ commentlistの添字を人とする？
$outmanlist = [];
for($j=0;$j<count($commentlist);$j++){
    echo "発言 ".$commentlist[$j].PHP_EOL;
    // 2人目以降の発言
    if($j>=1){
        // 直前の単語の最後尾文字列
        $last = substr($commentlist[$j-1], -1);
        $front = substr($commentlist[$j],0,1);
        if($last!=$front){
            // お手つきを登録
            $outmanlist[] =$j%$N;
            echo "お手つき1 ".$j%$N.PHP_EOL;
        }
        // 直前の文字列と一致チェック
        if($commentlist[$j-1]==$commentlist[$j]){
            // お手つきを登録
            $outmanlist[] =$j%$N;  
            echo "お手つき2 ".$j%$N.PHP_EOL;
        }
    }

    if(substr($commentlist[$j], -1)=='z'){
        // お手つきを登録
        $outmanlist[] =$j%$N;
        echo "お手つき3 ".$j%$N.PHP_EOL;
    }

}

$outmanlist = array_unique($outmanlist);
$safelist = array_diff($manlist, $outmanlist);
echo count($safelist).PHP_EOL;
for($i=0;$i<count($safelist);$i++){
    echo $safelist[$i].PHP_EOL;
}
