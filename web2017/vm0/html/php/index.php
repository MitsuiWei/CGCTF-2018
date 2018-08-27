<?php
$flag = file_get_contents("/flag/php");
$input = $_GET['input'];

if ($input)
    eval("echo $input;");

highlight_file(__FILE__);
