<?php
$input_line = trim(fgets(STDIN));
$parts = explode(" ", $input_line);
$reservedcnt = $parts[0];
$vetical = $parts[1];
$horizontal = $parts[2];
$man_x = $parts[3];
$man_y = $parts[4];

$reservedArray = [];

for($i=0;$i<$reservedcnt;$i++){
    $input_line = trim(fgets(STDIN));
    $parts = explode(" ", $input_line);
    $reservedArray[] = [$parts[0],$parts[1]];
}

$tmpMin=100000;

$resultArray = [];

for($i=0;$i<$vetical;$i++){
    for($j=0;$j<$horizontal;$j++){
        $isreserved=true;
        foreach($reservedArray as $val){
            if($val[0]==$i && $val[1]==$j){
                $isreserved = false;
                break;
            }
        }

        if($isreserved){
            $dist = abs($i-$man_x) + abs($j-$man_y);
            if($tmpMin > $dist){
                $resultArray = [[$i,$j]];
                $tmpMin = $dist;
            }else if($tmpMin == $dist){
                $resultArray[] = [$i,$j];
            }

        }
    }
}

foreach($resultArray as $val){
    echo $val[0].' '.$val[1].PHP_EOL;
}



