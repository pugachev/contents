<?php

// 回分チェックをどうするか？
// 配列に格納して0番目からN-1番目 N-1番目から0番目までが同じかを調べる

function isPalindrome($tgtstring){
    // 文字列を反転する
    $revers = strrev($tgtstring);

    if($tgtstring === $revers){
        return true;
    }else{
        return false;
    }
}

if(isPalindrome("racecar")){
    echo "racecarは、回分です".PHP_EOL;
}else{
    echo "racecarは、回分ではありません".PHP_EOL;
}

if(isPalindrome("hello")){
    echo "racecarは、回分です".PHP_EOL;
}else{
    echo "racecarは、回分ではありません".PHP_EOL;
}

