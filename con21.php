<?php
$input_num = trim(fgets(STDIN));
$input_line = trim(fgets(STDIN));
$parts = explode(" ", $input_line);

foreach($parts as $part){
    echo $part.PHP_EOL;
}
// for ($i = 0; $i < $input_line; $i++) {
//     $s = trim(fgets(STDIN));
//     $s = str_replace(array("\r\n","\r","\n"), '', $s);
//     $s = explode(" ", $s);
//     echo "hello = ".$s[0]." , world = ".$s[1]."\n";
// }