<?php
// 入力の受け取り
$input_line = intval(trim(fgets(STDIN)));
$arr = [];
for ($i = 0; $i < 2 * $input_line; $i++) {
    $arr[] = intval(trim(fgets(STDIN)));
}

function sortCount(&$arr, $l, $r) {
    $invCount = 0;
    if ($l < $r) {

        $m = floor(($l + $r) / 2);

        $invCount += sortCount($arr, $l, $m);

        $invCount += sortCount($arr, $m + 1, $r);

        $invCount += mysort($arr, $l, $m, $r);
    }
    return $invCount;
}

function mysort(&$arr, $l, $m, $r) {
    $left = array_slice($arr, $l, $m - $l + 1);
    $right = array_slice($arr, $m + 1, $r - $m);

    $i = 0;
    $j = 0;
    $k = $l;
    $invCount = 0;

    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $arr[$k++] = $left[$i++];
        } else {
            $arr[$k++] = $right[$j++];
            $invCount += (count($left) - $i);
        }
    }

    while ($i < count($left)) {
        $arr[$k++] = $left[$i++];
    }

    while ($j < count($right)) {
        $arr[$k++] = $right[$j++];
    }

    return $invCount;
}


$swapcnt = sortCount($arr, 0, count($arr) - 1);
echo $swapcnt . "\n";

