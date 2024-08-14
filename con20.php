<?php
// while (true) {
    $input_line = trim(fgets(STDIN));

    $parts = explode(" ", $input_line);

    foreach($parts as $part){
        echo $part.PHP_EOL;
    }
// }
