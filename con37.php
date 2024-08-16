<?php

// $input_line = intval(trim(fgets(STDIN)));
// $parts = explode(" ", $input_line);
// var_dump($parts);
// $seatnum = $parts[0];//座席数
// $groupnum = $parts[1];//グループ数

// fscanf(STDIN, "%d", $N);

fscanf(STDIN, "%d %d", $seatnum, $groupnum);

$arr = [];
for ($i = 0; $i < $groupnum; $i++) {
    fscanf(STDIN, "%d %d", $gnumber, $seatstart);
    $arr[] = [$gnumber,$seatstart];//グループ人数と開始座席番号
}


// print_r($arr);
$reserved = array_fill(0,$seatnum,true);//現在の座席の予約状況 true:予約可能 false:予約不可能

$isReserved = true;
$totalCnt = 0;

for($i=0;$i<count($arr);$i++){
    echo '[開始位置] '.($arr[$i][1]-1).PHP_EOL;
    $isReserve = true;
    $tmp = ($arr[$i][1]-1)%$seatnum;
    if($reserved[$tmp]){
        
        for($j=$tmp;$j<=$arr[$i][0];$j++){
            echo '開始座席='.$j.' 終了座席='.$arr[$i][0].PHP_EOL;
            if(!$reserved[$tmp+$j-1]){
                $isReserved = false;
                break;
            }else{
                // 予約がとれた場合はfalseにしておく
                $reserved[$tmp+$j-1]=false;
                echo "座席番号=".($tmp+$j-1).PHP_EOL;
            }
        }
    }

    if($isReserved){
        for($j=0;$j<$arr[$i][0];$j++){
            $reserved[$tmp+$j-1]=false;
        }
        $totalCnt += $arr[$i][0];
        print_r($reserved);
    }

}

print_r($totalCnt);