<?php

if (!isset($_GET["name"]))
    die(highlight_file(__FILE__, true));

$db = new SQLite3("/sql");
$name = $_GET["name"];
$result = $db->querySingle("select * from a_table where name='$name'", true);

if($result['name'] === "admin")
    echo file_get_contents("/flag/sql_injection");
else
    echo "You are: " . $result['name'];