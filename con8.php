<?php
function bubbleSort($arr) {
    $n = count($arr);
    // 外側の配列 配列長-1
    for($out=0;$out<$n-1;$out++){
        // 内側の配列 配列長-2
        for($in=0;$in<$n-$out-1;$in++){
            if($arr[$in] > $arr[$in+1]){
                $tmp = $arr[$in];
                $arr[$in] = $arr[$in+1];
                $arr[$in+1] = $tmp;
            }
        }
    }

    return $arr;
    
}

// 使用例
$numbers = [64, 34, 25, 12, 22, 11, 90];
$sortedNumbers = bubbleSort($numbers);

print_r($sortedNumbers);
