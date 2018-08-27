<?php
if ($_SERVER['HTTP_USER_AGENT'] === "curry"
    && $_GET['curl'] === "curry"
    && $_POST['curl'] === "curry") {
    echo "Flag is: " . file_get_contents('/flag/curl');
}

highlight_file(__FILE__);

/* NOTE
1. Request with ?curl=curry
2. Send POST data: curl=curry
3. Change User-Agent to curry
*/
