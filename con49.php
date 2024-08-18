<?php

// データ数:n個
fscanf(STDIN, "%d", $n);

// 訪問人数
$datalist = [];
for($i=0;$i<$n;$i++){
    $input_line = trim(fgets(STDIN));
    $parts = explode(" ", $input_line);
    $datalist[] = [$parts[0],$parts[1]];
}

$result = [];

for($i=0;$i<count($datalist);$i++){
    // 文字がresultに存在している場合はvalueを追加他仕込み
    if(isset($result[$datalist[$i][0]])){
        $result[$datalist[$i][0]] += $datalist[$i][1];
    }
    // 文字がresultに存在していなければ$result[$datalist[$i][0]] = $datalist[$i][1]
    else{
        $result[$datalist[$i][0]] = $datalist[$i][1];
    }
}

arsort($result);

foreach($result as $key => $val){
    echo $key.' '.$val.PHP_EOL;
}
