<?php

$tgtarray = range(1, 10);

// 3回シャッフルする
for($i=0;$i<2;$i++){
    $newarray = [];
    for($j=0;$j<10;$j+=3){
        $tmp = array_slice($tgtarray,$j,3);
        $newarray = array_merge($tmp,$newarray);
    }
    
    $tgtarray = $newarray;
}

print_r($tgtarray);