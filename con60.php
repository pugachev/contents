<?php

// コース数:N 危険度基準さ:M
fscanf(STDIN, "%d %d", $N, $M);

// コースデータの取得
$coursematrix = [];
for($i=0;$i<$N;$i++){
    $input_line = trim(fgets(STDIN));//まず行をとる ここではキャストしない
    $parts = explode(" ", $input_line);// 半角スペースで分割
    for($j=0;$j<$N;$j++){
        $coursematrix[$j][] = (int)$parts[$j];  // ここで入力を整数にキャスト
    }
}


// あなたは複数ある列のどれか 1 つを選び、下に向かってまっすぐ進むことしかできません
$isDisable = false;
$saferoutnum = [];
//縦に走査
for ($col = 0; $col < $N; $col++) {
    for ($row = 0; $row < $N; $row++) {
        
        if($coursematrix[$col][$row] >= $M){
            $isDisable = true;
        }
    }
    if(!$isDisable){
        $saferoutnum[] = ($col+1);
        // echo ($col+1).PHP_EOL;
    }
    $isDisable = false;
}

if(count($saferoutnum) > 0){
    for($i=0;$i<count($saferoutnum);$i++){
        if(count($saferoutnum)==1){
            echo $saferoutnum[$i];
        }else{
            echo $saferoutnum[$i].'';
        }
        
    }
}else{
    echo "wait".PHP_EOL;
}