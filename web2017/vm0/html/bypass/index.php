<?php

include("./flag.php");

$a1 = $_GET['a1'];
$b1 = $_GET['b1'];

$a2 = $_GET['a2'];
$b2 = $_GET['b2'];

highlight_file(__FILE__);


if ((string) $a1 != (string) $b1 && md5($a1) == md5($b1)) {
    echo "Stage 1 passed\n";
    if ($a2 != $b2 && strcmp($a2, $b2) == 0) {
        echo "Stage 2 passed\n" . $flag1;
    }
}


