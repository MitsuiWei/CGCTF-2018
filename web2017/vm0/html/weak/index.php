<?php

highlight_file(__FILE__);


$input = $_GET["input"];
if($input === NULL)
    die('<a href="?input=0">?input=0</a>');

echo "<pre>";

// This is weak
echo '$input == 0 : ';
var_dump($input == 0);

// strcmp is weak
echo 'strcmp($input, "0") : ';
var_dump(strcmp($input, "0"));

// === and !== are strong
echo '$input === "0" : ';
var_dump($input === "0");

// weak/?input=xxx
if ((int) $input === 0 && $input !== "0")
    system("cat /flag/weak");

echo "</pre>";
