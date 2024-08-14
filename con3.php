<?php
while (true) {
    echo "あなたの名前を入力してください（終了するには 'exit' と入力してください）: ";
    $name = trim(fgets(STDIN));

    if ($name == 'exit') {
        break;
    }

    echo "こんにちは、" . $name . "さん！\n";
}
echo "プログラムを終了します。\n";
