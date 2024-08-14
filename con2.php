<?php

echo "最初の数値を入力してください: ";
$number1 = preg_replace('/\s+/', '', fgets(STDIN));

echo $number1.PHP_EOL;

echo "次の数値を入力してください: ";
$number2 = preg_replace('/\s+/', '', fgets(STDIN));
echo $number2.PHP_EOL;

$sum = $number1 + $number2;

echo "合計は " . $sum . " です。\n";