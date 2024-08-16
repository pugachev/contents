<?php

fscanf(STDIN, "%d %d", $seatnum, $groupnum);

$arr = [];
for ($i = 0; $i < $groupnum; $i++) {
    fscanf(STDIN, "%d %d", $gnumber, $seatstart);
    $arr[] = [$gnumber, $seatstart];
}

$reserved = array_fill(0, $seatnum, true);

$totalCnt = 0;

for ($i = 0; $i < count($arr); $i++) {
    $group_size = $arr[$i][0];
    $start_seat = $arr[$i][1] - 1; // 配列のインデックスに合わせるため -1

    $isReserve = true;

    for ($j = 0; $j < $group_size; $j++) {
        $current_seat = ($start_seat + $j) % $seatnum;

        if (!$reserved[$current_seat]) {
            $isReserve = false;
            break;
        }
    }

    if ($isReserve) {
        for ($j = 0; $j < $group_size; $j++) {
            $current_seat = ($start_seat + $j) % $seatnum;
            $reserved[$current_seat] = false;
        }
        $totalCnt += $group_size;
    }
}

echo $totalCnt . PHP_EOL;
