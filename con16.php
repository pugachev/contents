<?php
echo "日本語の文字列を入力してください: ";
$input = trim(fgets(STDIN)); // 標準入力からデータを読み取る

// 入力された日本語文字列を表示
echo "入力された文字列: " . $input . "\n";

// 半角スペースを削除
$input_no_spaces = str_replace(' ', '', $input);

echo "半角スペースを削除した結果: " . $input_no_spaces . "\n";
