<?php

$bad = ['/', '\\', '.', ' ', '_', ';'];
$word = str_replace($bad, '', $_GET["word"]);

if ($word) {
    system("echo $word");
} else {
    highlight_file(__FILE__);
}


