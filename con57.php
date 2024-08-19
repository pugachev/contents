<?php

// 横:H 縦:W
fscanf(STDIN, "%d %d", $H, $W);

$tgtomatrix = array_fill(0, $H, array_fill(0, $W, 0));
// 1行で複数の文字列を受け取る場合(アルファベットがある場合はこちら)
for($i=0;$i<$H;$i++){
    $input_line = trim(fgets(STDIN));//まず行をとる ここではキャストしない
    $parts = str_split($input_line);// 半角スペースで分割   
    for($j=0;$j<$W;$j++){
        $tgtomatrix[$i][$j] = $parts[$j];
    } 

}

$totalCnt = 0;

for($i=0;$i<$H;$i++){
    for($j=0;$j<$W;$j++){
        $isOK = false;
        if($tgtomatrix[$i][$j] == "."){
            
            if(isset($tgtomatrix[$i-1][$j-1]) && $tgtomatrix[$i-1][$j-1]=="#"// 左上
                && isset($tgtomatrix[$i-1][$j]) && $tgtomatrix[$i-1][$j]=="#" // 真上
                && isset($tgtomatrix[$i-1][$j+1]) && $tgtomatrix[$i-1][$j+1]=="#" // 右上
                && isset($tgtomatrix[$i][$j-1]) && $tgtomatrix[$i][$j-1]=="#" // 左
                && isset($tgtomatrix[$i][$j+1]) && $tgtomatrix[$i][$j+1]=="#" // 右
                && isset($tgtomatrix[$i+1][$j-1]) && $tgtomatrix[$i+1][$j-1]=="#" // 左下
                && isset($tgtomatrix[$i+1][$j]) && $tgtomatrix[$i+1][$j]=="#" // 真下
                && isset($tgtomatrix[$i+1][$j+1]) && $tgtomatrix[$i+1][$j+1]=="#" // 右下
            ){
                    $isOK = true;
            }
            if($isOK){
                $totalCnt +=1;
            }
        }
    }
}

echo $totalCnt.PHP_EOL;
