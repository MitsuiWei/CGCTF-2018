<?php

if(!isset($_GET["s"]))
    die(highlight_file(__FILE__, true));

$s = $_GET["s"];

if (strcmp($s, "deadbeaf") == 0 &&
    sha1($s) != sha1("deadbeaf"))
    echo file_get_contents("/flag/weak_hash");

