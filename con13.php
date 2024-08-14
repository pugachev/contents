<?php

// アナグラム判定関数の例
// 文字列を各文字まで分解してソートする
// その配列が同じなら回分となる

function areAnagrams($arr1,$arr2){

    // スペースを端折って小文字に揃える
    $string1 = strtolower(preg_replace('/\s+/', '', $arr1));
    $string2 = strtolower(preg_replace('/\s+/', '', $arr2));

    if(strlen($string1) !== strlen($string2)){
        return false;
    }

    $array1 = str_split($string1);
    $array2 = str_split($string1);

    sort($array1);
    sort($array2);

    // var_dump($array1);
    // var_dump($array2);

    return $array1 == $array2;
}

$string1 = "Listen";
$string2 = "Silemaaaant";

if(areAnagrams($string1,$string2)){
    echo "アナグラムです";
}else{
    echo "アナグラムではないです";
}

