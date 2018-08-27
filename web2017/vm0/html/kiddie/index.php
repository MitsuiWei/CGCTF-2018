<?php

// Read flag
$flag = file_get_contents("/flag/kiddie");

// Base64 encode ten times
for ($i=0; $i<10; $i++) {
    $flag = base64_encode($flag);
}

$count = (int) $_COOKIE['count'];

// Increase count
setcookie("count", $count + 1);

// Show the count-th character of the encoded flag
echo substr($flag, $count, 1);

// Display this source code
highlight_file(__FILE__);

// Show the size of encoded flag
echo $count . "<br>" . strlen($flag);

