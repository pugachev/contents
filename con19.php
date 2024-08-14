<?php

function fibonacchi($num){
    
    if($num==0){
        return 0;
    }

    if($num==1){
        return 1;
    }

    return fibonacchi($num-1) + fibonacchi($num-2);

}


echo fibonacchi(10);