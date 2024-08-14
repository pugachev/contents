<?php

// 階乗の計算

function kaijyo($num){

    if($num==1){
        return 1;
    }else{
        return kaijyo($num-1)*$num;
    }

}

echo kaijyo(5);