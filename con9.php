<?php
// 重複の削除

$numbers = [1, 2, 2, 3, 4, 4, 5];

print_r(array_values(array_unique($numbers)));