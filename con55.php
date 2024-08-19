<?php
function createMap($H, $W, $D) {
    $map = array_fill(0, $H, array_fill(0, $W, 0));
    $num = 1;

    if ($D == 1) { // 右斜め上
        for ($i = 0; $i < $H + $W - 1; $i++) {
            if($i<$H){
                $y = $i;
            }else{
                
            }


            // $y = ($i < $H) ? $i : $H - 1;
            // $x = ($i < $H) ? 0 : $i - $H + 1;

            // while ($y >= 0 && $x < $W) {
            //     $map[$y][$x] = $num++;
            //     $y--;
            //     $x++;
            // }
        }
    } elseif ($D == 2) { // 真横右
        for ($y = 0; $y < $H; $y++) {
            for ($x = 0; $x < $W; $x++) {
                $map[$y][$x] = $num++;
            }
        }
    } elseif ($D == 3) { // 真下
        for ($x = 0; $x < $W; $x++) {
            for ($y = 0; $y < $H; $y++) {
                $map[$y][$x] = $num++;
            }
        }
    } elseif ($D == 4) { // 左斜め下
        for ($i = 0; $i < $H + $W - 1; $i++) {
            $y = ($i < $W) ? 0 : $i - $W + 1;
            $x = ($i < $W) ? $i : $W - 1;

            while ($y < $H && $x >= 0) {
                $map[$y][$x] = $num++;
                $y++;
                $x--;
            }
        }
    }

    return $map;
}

function printMap($map) {
    foreach ($map as $row) {
        echo implode(" ", $row) . "\n";
    }
}

list($H, $W, $D) = explode(" ", trim(fgets(STDIN)));
$map = createMap($H, $W, $D);
printMap($map);
