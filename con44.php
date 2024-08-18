<?php

// ポケット数/枚 n個 名刺番号 m
fscanf(STDIN, "%d %d", $n, $m);

$tmp = $m%$n;
$pagenum = floor($m/$n);
// echo 'pagenum='.$pagenum.' tmp='.$tmp.PHP_EOL;
if($tmp==0){
    $pagenum-=1;
}


// ページの最初の数
$firstnum = $pagenum*$n + 1;
$diff = $m - $firstnum;

$result=0;
if($pagenum%2==0){
    //偶数ページの場合は次の奇数ページを参照する
    $start = ($pagenum+1)*$n;
    $array = range($start+1,$start+$n);
    // print_r($array);
    $array = array_reverse($array,false);
    $result = $array[$diff];
    // echo '偶数 start='.$start.' result='.$result.' pagenum='.$pagenum.PHP_EOL;
}else{
    //奇数ページの場合は次の偶数ページを参照する
    $start = ($pagenum-1)*$n+1;
    $array = range($start,$n);
    // print_r($array);
    $array = array_reverse($array,false);
    $result = $array[$diff];
    // echo '奇数 start='.$start.' result='.$result.' pagenum='.$pagenum.PHP_EOL;
}

echo $result.PHP_EOL;