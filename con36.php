<?php

function extract_subarrays($array) {
    $result = [];
    $length = count($array);

    for ($i = 0; $i < $length - 2; $i++) {
        $subarray = array_slice($array, $i, 3);
        $result[] = $subarray;
    }

    return $result;
}

$tgt = [10, 2, 3, 6, 8, 7, 3, 1, 12, 18, 2];
$subarrays = extract_subarrays($tgt);

foreach ($subarrays as $subarray) {
    print_r($subarray);
}