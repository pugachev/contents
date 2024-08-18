<?php

$firstCharacter = trim(fgets(STDIN));
$secondCharacter = trim(fgets(STDIN));
$tgtCharacter = trim(fgets(STDIN));

echo ord($firstCharacter).PHP_EOL;
echo ord($secondCharacter).PHP_EOL;
echo ord($tgtCharacter).PHP_EOL;

$alapabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Y','Z'];


$firstnum = array_search($firstCharacter,$alapabet);
$secondnum = array_search($secondCharacter,$alapabet);
$tgtnum = array_search($tgtCharacter,$alapabet);

if($firstnum<=$tgtnum && $tgtnum <= $secondnum){
    echo "true".PHP_EOL;
}else{
    echo "false".PHP_EOL;
}