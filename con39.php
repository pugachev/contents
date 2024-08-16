<?php

fscanf(STDIN, "%d %d", $seatnum, $groupnum);

$arr = [];
for ($i = 0; $i < $groupnum; $i++) {
    fscanf(STDIN, "%d %d", $gnumber, $seatstart);
    $arr[] = [$gnumber,$seatstart];//グループ人数と開始座席番号
}

$reserved = array_fill(0,$seatnum,true);//現在の座席の予約状況 true:予約可能 false:予約不可能
$totalCnt=0;

for($i=0;$i<count($arr);$i++){

    $isReserve = true;

    $tgtpeople = $arr[$i][0];      // 対象グループの人数
    $tgtstartpos = ($arr[$i][1] - 1)%$seatnum;// 対象グループの座席開始位置(配列インデックスにあわせて-1)

    for($j=0;$j<$tgtpeople;$j++){
        // 座席開始位置に人数を足し込むと自然と座席番号になる
        $tgtseatpos = ($tgtstartpos+$j)%$seatnum;

        if(!$reserved[$tgtseatpos]){
            $isReserve=false;
            break;
        }
    }

    if($isReserve){
        for($j=0;$j<$tgtpeople;$j++){
            $tgtseatpos = ($tgtstartpos+$j)%$seatnum;
            $reserved[$tgtseatpos] = false;
        }

        $totalCnt += $tgtpeople;
    }

}

print_r($totalCnt);