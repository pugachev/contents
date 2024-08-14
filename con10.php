<?php
function isPrime($number) {
    // 1以下の数は素数ではない
    if ($number <= 1) {
        return false;
    }

    // 2は唯一の偶数の素数
    if ($number == 2) {
        return true;
    }

    // 偶数は素数ではない
    if ($number % 2 == 0) {
        return false;
    }

    // 数字の平方根までチェックすれば十分
    $sqrt = sqrt($number);
    // echo 'sqrt='.$sqrt.PHP_EOL;
    for ($i = 3; $i <= $sqrt; $i += 2) {
        if ($number % $i == 0) {
            echo ' i='.$i.' number='.$number.PHP_EOL;
            return false;
        }
    }

    return true;
}


if(isPrime(2205)){
    echo "素数です";
}else{
    echo "素数でない";
}