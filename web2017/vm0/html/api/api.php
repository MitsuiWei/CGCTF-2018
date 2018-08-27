<?php
header("Content-Type: text/plain");
if ($_GET["api_key"] !== "kcc175b9c0f1b6a831c399e269772661")
    die("Invalid key");

if ((int) $_GET["show_secret"])
    echo "CGCTF{api_key_identifies_users}";
else
    echo shell_exec("ps aux");