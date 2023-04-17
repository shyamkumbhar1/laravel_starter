<?php

$num = 1;

for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $num . " ";
        $num++;
    }
    echo "<br>";
}

?>
