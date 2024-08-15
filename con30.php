<?php
// $input = array("a", "b", "c", "d", "e");

// // 最初の3つの要素を取り出す
// $output = array_slice($input, 0, 3);
// print_r($output);
// // 結果: Array ( [0] => a [1] => b [2] => c )

// // 配列の3番目の要素から最後までを取り出す
// $output = array_slice($input, 2);
// print_r($output);
// // 結果: Array ( [0] => c [1] => d [2] => e )

// // 配列の最後から2つの要素を取り出す
// $output = array_slice($input, -2);
// print_r($output);
// // 結果: Array ( [0] => d [1] => e )

// // キーを保持して部分配列を取得
// $output = array_slice($input, 1, 3, true);
// print_r($output);
// // 結果: Array ( [1] => b [2] => c [3] => d )


function mergeSort($arr) {
    if (count($arr) <= 1) {
        return $arr;
    }

    // 配列を2つに分割
    $mid = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);

    // 再帰的にソート
    $left = mergeSort($left);
    $right = mergeSort($right);

    // マージしてソートされた配列を返す
    return merge($left, $right);
}

function merge($left, $right) {
    $result = [];
    $i = 0;
    $j = 0;
    $cnt=0;

    // 左右の配列をマージ
    while ($i < count($left) && $j < count($right)) {
        if ($left[$i] <= $right[$j]) {
            $result[] = $left[$i++];
        } else {
            $result[] = $right[$j++];
            $cnt += (count($left) - $i);
        }
    }

    // 残りの要素を追加
    while ($i < count($left)) {
        $result[] = $left[$i++];
    }

    while ($j < count($right)) {
        $result[] = $right[$j++];
    }

    return [$result,$cnt];
}

// テスト用の配列
$arr = [2,1,1,2,3,3];
list($arr,$cnt) = mergeSort($arr);

// echo "ソートされた配列: " . implode(", ", $sortedArr) . "\n";
echo $cnt;
