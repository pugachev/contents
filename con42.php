<?php

// トランプの縦・横・人数を格納する
fscanf(STDIN, "%d %d %d", $h, $w, $n);

// トランプを作成する
$cardmatrix = [];
for ($i = 0; $i < $h; $i++) {
    for($j = 0; $j < $w ;$j++){
        $cardmatrix[$i][$j]=null;
    }
}

// print_r($cardmatrix);

for ($i = 0; $i < $h; $i++) {
    $input_line = intval(trim(fgets(STDIN)));
    $parts = explode(" ", $input_line);
    for($j=0; $j < $w; $j++){
        $cardmatrix[$i][$j] = $parts[$j];
    }
}

