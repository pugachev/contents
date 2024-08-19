<?php

// ★No.1 [画面入力値を受け取る方法]

// 1行で複数の数値(文字以外)がある場合
// 日数:n日 キャンペーン日数:k日
fscanf(STDIN, "%d %d", $n, $k);

// 1行で複数の文字列を受け取る場合(アルファベットがある場合はこちら)
$people = [];
$input_line = trim(fgets(STDIN));//まず行をとる ここではキャストしない
$parts = explode(" ", $input_line);// 半角スペースで分割
for($i=0;$i<count($parts);$i++){
    $people[] = (int)$parts[$i];  // ここで入力を整数にキャスト
}


// ★No.2 [条件があった値のにを格納する]
if($tmpavg > $avgmax){
    $avgmax = $tmpavg;
    $candidatearray = [$i + 1];  // 開始日を保存（1-indexed）$array = [$i+1] これは配列の初期化
    echo "その1".PHP_EOL;
    print_r($candidatearray);
} elseif ($tmpavg == $avgmax) {
    $candidatearray[] = $i + 1;  // 同じ平均値なら候補として追加 $array[] = $i+1; これは配列に追加してる
    echo "その2".PHP_EOL;
    print_r($candidatearray);
}


// ★No.3 [2次元配列の初期化の仕方]
//これで$Nの幅の配列0詰を作成する [0, 0, 0]
array_fill(0, $N, 0);
// 次に[0, 0, 0]という要素で$N個で初期化する
// [
//     [0, 0, 0],
//     [0, 0, 0],
//     [0, 0, 0]
// ]
$bingomatrix = array_fill(0, $N, array_fill(0, $N, 0));


// ★No.4 [画面から受け取った文字のアスキーコードを出す]
// 標準入力から1行を受け取る
$input = trim(fgets(STDIN));

// 1文字のみ受け取る
$char = $input[0]; // 入力が複数文字の場合、最初の1文字を取得

// ASCIIコードの取得
$ascii_code = ord($char);

// これで大小比較が可能となる
// xxx > ord($char) といった感じ

// ★No.5 [配列をスライスする方法]
// 対象の配列を 12,3,9,5,7,8,11,20
// 切り取る長さを3個とする
for($i=0;$i<=$n-$k;$i++){
    $tmparray = array_slice($people, $i, $k);
    // $i=0 12,3,9
    // $i=1 3,9,5
    // $i=2 9,5,7
    // $i=3 5,7,8
    // $i=4 7,8,11
    // $i=5 8,11,20
}

$array = [10, 20, 30, 40, 50, 60, 70];

// 配列の最初の3つの要素を取得
$slice1 = array_slice($array, 0, 3);
print_r($slice1); // [10, 20, 30]

// 3番目の要素から最後までの要素を取得
$slice2 = array_slice($array, 2);
print_r($slice2); // [30, 40, 50, 60, 70]

// 配列の最後の3つの要素を取得
$slice3 = array_slice($array, -3);
print_r($slice3); // [50, 60, 70]

// 配列の4番目の要素から2つの要素を取得（キーを維持）
$slice4 = array_slice($array, 3, 2, true);
print_r($slice4); // [3 => 40, 4 => 50]



// ★No.6 [アナグラムチェックの仕方]
// その1 単語の全部の文字を大文字か小文字にする
// その2 文字を昇順/降順で並び替える
// その3 その文字列を比較して一致すれば、アナグラムとなる
// 文字列を配列に変換し、アルファベット順にソートする方法
$array1 = str_split($string1);
sort($array1);

// ★No.7 [文字列の共通部分を取り出す]
$array1 = [1, 2, 3, 4, 5];
$array2 = [3, 4, 5, 6, 7];

// 配列の共通部分を取得
$common = array_intersect($array1, $array2);

// ★No.8 [文字列から重複を排除する方法]
$array = [1, 2, 3, 4, 5, 2, 3, 6];

// 配列から重複を削除(キーの値はそのまま)
$uniqueArray = array_unique($array);

// キーの値をリセットする
$uniqueArray = array_values(array_unique($array));


// ★No.9 [配列の各要素の出現回数を数える] その1
$valuesCount = array_count_values($array);

// in_arrayを使って手動で調べる 新しい配列に重複する値を追加しない
$array = [1, 2, 3, 4, 5, 2];
$seen = [];
$hasDuplicates = false;

foreach ($array as $value) {
    if (in_array($value, $seen)) {
        $hasDuplicates = true;
        break;
    }
    $seen[] = $value;
}

// ★No.10 [配列の要素の最大値と最小値を調べる方法]
$array = [3, 7, 2, 8, 1, 4];

// 配列の最大値を取得
$maxValue = max($array);

// 配列の最小値を取得
$minValue = min($array);

echo "最大値: " . $maxValue . "\n"; // 出力: 最大値: 8
echo "最小値: " . $minValue . "\n"; // 出力: 最小値: 1


// ★No.11 [単語と単語の間の空白を削除する方法]
$string = "  Hello,    World!  ";
$trimmed = trim(preg_replace('/\s+/', ' ', $string));

echo $trimmed; // 出力: "Hello, World!"


// ★No.12 [多次元配列の作り方の色々]
// この文は、変数 $tgtArray3 に1つの要素を持つ配列を代入しています。
// この配列の唯一の要素は、[1,2] という2つの数値を持つ配列です。つまり、$tgtArray3 は多次元配列になります
$tgtArray3 = [[1,2]];
print_r($tgtArray3);
// Array
// (
//     [0] => Array
//         (
//             [0] => 1
//             [1] => 2
//         )
// )

// この文は、変数 $tgtArray3 に2つの要素を持つ配列を代入しています。
// この配列には、1と2という2つの数値が直接格納されており、$tgtArray3 は一次元配列になります。
$tgtArray3 = [1,2];
print_r($tgtArray3);
// Array
// (
//     [0] => 1
//     [1] => 2
// )


// ★No.13 [素数チェック]
// 最初から1と2は別格
function isPrime($number) {
    // 1以下の数は素数ではない
    if ($number <= 1) {
        return false;
    }

    // 2は唯一の偶数の素数
    if ($number == 2) {
        return true;
    }

    // 偶数は素数ではない
    if ($number % 2 == 0) {
        return false;
    }

    // 数字の平方根までチェックすれば十分
    // 例えば、$numberが36であれば、$sqrtには6が格納されます。
    // なぜ奇数だけを調べるかというと、
    // 偶数はすでに前提条件（2で割り切れないことの確認）でチェックされているためです。
    $sqrt = sqrt($number);
    for ($i = 3; $i <= $sqrt; $i += 2) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

// ★No.14 [配列の最初の要素を取り除く]
$fruits = ["apple", "banana", "cherry"];

$firstFruit = array_shift($fruits);

echo $firstFruit;  // "apple" が出力されます
print_r($fruits);  // ["banana", "cherry"] が出力されます 元の配列が変わってしまう

// ★No.15 [再帰関数の動作の見方]
// Divide: 5, 3, 8
//   Divide: 5
//   Divide: 3, 8
//     Divide: 3
//     Divide: 8
//     Merge: 3, 8
//   Merge: 3, 5, 8
// Merge: 3, 5, 8
// Array
// (
//     [0] => 3
//     [1] => 5
//     [2] => 8
// )

function divide($array, $depth = 0) {
    // インデント用のスペースを計算
    $indent = str_repeat("  ", $depth);

    // 現在の配列を表示
    echo $indent . "Divide: " . implode(", ", $array) . "\n";

    if (count($array) <= 1) {
        return $array;
    }

    $middle = count($array) / 2;
    $leftArray = array_slice($array, 0, $middle);
    $rightArray = array_slice($array, $middle);

    // 再帰的に左と右の配列を分割してソート
    $leftArray = divide($leftArray, $depth + 1);
    $rightArray = divide($rightArray, $depth + 1);

    // マージの過程を表示
    $merged = merge($leftArray, $rightArray);
    echo $indent . "Merge: " . implode(", ", $merged) . "\n";
    return $merged;
}

function merge($leftArray, $rightArray) {
    $result = [];
    while (count($leftArray) > 0 && count($rightArray) > 0) {
        if ($leftArray[0] <= $rightArray[0]) {
            $result[] = array_shift($leftArray);
        } else {
            $result[] = array_shift($rightArray);
        }
    }
    return array_merge($result, $leftArray, $rightArray);
}

// 使用例
$array = [5, 3, 8];
$sortedArray = divide($array);
print_r($sortedArray);


// ★No.15 [最小交換回数の計算]
// 何となくピンとこない
function countSwaps($current, $target) {
    $n = count($current);
    $swaps = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            // $i=0 2 $j=1 2
            // $i=1 1 $j=2 3
            // $i=2 1 $j=3 2
            // $i=3 2 $j=4 2
            // $i=4 3 $j=5 3
            // $i=5 3 $j=6 -
            if (array_search($current[$i], $target) > array_search($current[$j], $target)) {
                $swaps++;
            }
        }
    }
    return $swaps;
}

$current = [2, 1, 1, 2, 3, 3];
$target = [1, 2, 3, 1, 2, 3];

echo countSwaps($current, $target);

// ★No.16 [配列内の要素の移動]
// 配列長はそのまま
$tgt = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
$N = count($tgt); // 配列の要素数
$shift = 3; // 右に進める個数

// 新しい配列を初期化
$result = array_fill(0, $N, 0);

// 各要素を右側に進める
for ($i = 0; $i < $N; $i++) {
    // 新しいインデックスを計算
    $newIndex = ($i + $shift) % $N;// やはりmodがでました。+3するとindexがはみ出るのでmod(剰余)の出番です
    $result[$newIndex] = $tgt[$i];
}

// 結果を出力
print_r($result);

// ★No.17 [連想配列のサラッとした使い方]
// 与えられたデータ（文字列を配列に格納）
$data = [
    ["A", 1],
    ["D", 6],
    ["C", 2],
    ["G", 4],
    ["B", 70],
    ["A", 10],
    ["B", 5]
];

// 結果を格納するための連想配列を初期化
$result = [];

// 各データをループして、アルファベットごとに値を加算
foreach ($data as $entry) {
    $letter = $entry[0];  // アルファベット
    $value = $entry[1];   // 数値

    if (isset($result[$letter])) {//はい、ココ大事！$letterのkeyが存在すると追加
        $result[$letter] += $value;// 存在すると追加
    } else {
        $result[$letter] = $value;// 存在しないとkey=>$letter value=>$valueとして要素を新規追加する
    }
}

// 結果を出力
foreach ($result as $letter => $total) {
    echo "$letter $total\n";
}
