<?php
$win = 0;
$input_num = trim(fgets(STDIN));

for($i=0;$i<$input_num;$i++){
    $input_line = trim(fgets(STDIN));
    $parts = explode(" ", $input_line);
    if($parts[0]=='P' && $parts[1]=='G'){
        $win +=1;
    }else if($parts[0]=='G' && $parts[1]=='C'){
        $win +=1;
    }else if($parts[0]=='C' && $parts[1]=='P'){
        $win +=1;
    }
}


echo $win;

