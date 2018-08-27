<?php

/* Ping an IP address
Flag is in flag.php */

$ip = $_GET["ip"];
if ($ip)
    echo "<pre>" . shell_exec("ping -c 1 $ip 2>&1") . "</pre>";

highlight_file(__FILE__);
