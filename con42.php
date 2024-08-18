<?php

// 人数:N 単語数:K 発言数:M
fscanf(STDIN, "%d %d %d", $N, $K, $M);

// 人物リスト
$manlist = range(1, $N);

// 単語リスト
$wordlist = [];
for($i=0;$i < $K; $i++){
    fscanf(STDIN,"%s",$word);
    $wordlist[] = $word;
}

// 発言リスト
$commentlist = [];
for($i=0;$i < $M; $i++){
    fscanf(STDIN,"%s",$comment);
    $commentlist[] = $comment;
}

// 勝利者リスト
$winnerlist = [];
// 勝利者総数
$totalcnt = 0;
// 脱落者リスト
$dropoutlist = [];
// 脱落者フラグ
$isDropout = true;
// 現在ユーザーフラグ
$isCurrentUser = true;
// 使用済単語リスト
$usedwordlist = [];

for($i = 0;$i < count($commentlist);$i++){

    if($isDropout){
       $isCurrentUser = (($i+1)%$N);
    }

    // 現在ユーザーフラグが脱落者リストに存在するかをチェック
    $isDropout = in_array($isCurrentUser,$dropoutlist);
    if($isDropout){
        continue;
    }

    //最初の人以外の発言の頭文字は、直前の人の発言の最後の文字と一緒でなければならない
    if($i > 0){
        if(substr($commentlist[$i],0,1) !== substr($commentlist[$i-1],-1)){
            $dropoutlist[] = $isCurrentUser;
            $isDropout = true;
            continue;
        }
    }

    // 今までに発言された単語を発言してはならない。
    if(in_array($commentlist[$i],$usedwordlist)){
        $dropoutlist[] = $isCurrentUser;
        $isDropout = true;
        continue;
    }

    // z で終わる単語を発言してはならない
    if(substr($commentlist[$i],-1) == 'z'){
        $dropoutlist[] = $isCurrentUser;
        $isDropout = true;
        continue;
    }

    if(!$isDropout){
        $winnerlist[] = $isCurrentUser;
        $totalcnt +=1;
        $isDropout = true;
    }
}


$dropoutlist = array_unique($dropoutlist);
$winnerlist = array_diff($manlist,$dropoutlist);

echo $totalcnt.PHP_EOL;
for($i=0;$i<count($winnerlist);$i++){
    echo $winnerlist[$i].PHP_EOL;
}

