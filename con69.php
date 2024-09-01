<?php

function evaluateExpression($expression) {
    // 空白を取り除く
    $expression = str_replace(' ', '', $expression);
    
    // 再帰的に括弧の中身を処理する
    while (strpos($expression, '(') !== false) {
        $expression = preg_replace_callback('/\(([^()]+)\)/', function($matches) {
            return evaluateExpression($matches[1]);
        }, $expression);
    }
    
    // 足し算と引き算を処理する
    if (preg_match('/(-?\d+\.?\d*)\+(-?\d+\.?\d*)/', $expression, $matches)) {
        return evaluateExpression($matches[1]) + evaluateExpression($matches[2]);
    }
    if (preg_match('/(-?\d+\.?\d*)-(-?\d+\.?\d*)/', $expression, $matches)) {
        return evaluateExpression($matches[1]) - evaluateExpression($matches[2]);
    }
    
    // 掛け算と割り算を処理する
    if (preg_match('/(-?\d+\.?\d*)\*(-?\d+\.?\d*)/', $expression, $matches)) {
        return evaluateExpression($matches[1]) * evaluateExpression($matches[2]);
    }
    if (preg_match('/(-?\d+\.?\d*)\/(-?\d+\.?\d*)/', $expression, $matches)) {
        return evaluateExpression($matches[1]) / evaluateExpression($matches[2]);
    }
    
    // 数字のみの場合はそのまま返す
    return $expression;
}

$expression = "3+(12*3)/4";
$result = evaluateExpression($expression);

echo "結果: " . $result;

?>
