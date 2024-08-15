<?php

    $tgtArray = [];
    $tgtArray[] = [1,2];
    $tgtArray[] = [3,4];
    print_r($tgtArray);

    echo "---".PHP_EOL;

    $tgtArray2 = [];
    $tgtArray2 = [1,2];
    $tgtArray2 = [3,4];
    print_r($tgtArray2);

    echo "---".PHP_EOL;

    $tgtArray3 = [];
    // $tgtArray3 = [[1,2]];
    // $tgtArray3 = [[3,4]];
    // $tgtArray3[] = [1,2];
    $tgtArray3 = [1,2];// 配列の0番目が1 1番目が2 3番目に配列(3,4)が来ている
    $tgtArray3[] = [3,4];
    print_r($tgtArray3);