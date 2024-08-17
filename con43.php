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


