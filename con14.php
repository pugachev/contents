<?php

// 参照を使った代入
$array = [
    'key1' => [
        'subkey1' => '相場詩織',
        'subkey2' => '竹俣紅',
    ],
];

$ref = &$array['key1']['subkey1'];
$ref = '上野愛奈'; // $array['key1']['subkey1'] も "new value" に変更される

print_r($array);

