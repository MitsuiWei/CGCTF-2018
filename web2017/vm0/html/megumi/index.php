<div>
    <h2>Do you see the flag?</h2>
    <img src="http://i0.hdslb.com/bfs/archive/71347a8f8c50a733a6e500476d61a4d86dae1765.jpg">
</div>

<?php

/* This is the source code of this page. */

$flag = file_get_contents("/flag/megumi");

if (isset($_GET["love#megumi"])) {
    $input = $_POST["love=megumi"];
    if (strcmp($input, $flag) == 0) {
        echo $flag;
    } else {
        echo 'Sorry... I want $input == $flag';
    }
} else {
    highlight_file(__FILE__);
}

?>
