<?php
    // $input_line = trim(fgets(STDIN));
    // $parts = explode(" ",$input_line);
    // for($i=0;$i<count($parts);$i++){
    //     echo $parts[$i].PHP_EOL;
    // }
    // echo PHP_EOL;

    // $input_line = trim(fgets(STDIN));//最初に何行を入力するかを指定している
    // for ($i = 0; $i < $input_line; $i++) {
    //     $s = trim(fgets(STDIN));
    //     $s = str_replace(array("\r\n","\r","\n"), '', $s);
    //     $s = explode(" ", $s);
    //     echo "hello = ".$s[0]." , world = ".$s[1]."\n";
    // }

$input_line = preg_replace('/\s+/', ' ', trim(fgets(STDIN)));
$parts = explode(" ", $input_line);
foreach ($parts as $part) {
    if ($part !== "") {
        echo $part . PHP_EOL;
    }
}