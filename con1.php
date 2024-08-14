<?php

$string = "1 2";
$result = preg_replace('/\s+/', '', $string);

echo $result; // 出力: "12"