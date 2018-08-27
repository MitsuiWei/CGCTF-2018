<title>Otaku's world</title>
<style>body{font-family:monospace,Helvetica;}</style>
<h1>Otaku's world</h1>
<a href=".">[Home]</a>
<a href="?page=about">[About]</a>
<!--<a href="?page=secret">[Secret]</a>-->
<a href="?page=hahaha">[Hahaha]</a>
<a href="?page=hint">[Hint]</a>
<hr>


<?php
$secret = "loves";

if (isset($_GET["secret"])) {
    // This is just nothing.
    $secret = "hates";
    echo $_GET['secret']." is not the secret, try again!";
}

if (isset($_GET["page"])) {
    $name = str_replace($_GET["page"], "/", "");
    echo file_get_contents($_GET["page"].".php");
} else {
    echo "<h3>I have lots of girlfriends</h3>";
    echo "But they are not in 3D.";
}

if(isset($_COOKIE["my_wife"])) {
    $wife = base64_decode($_COOKIE["my_wife"]);
    // You have to be an otaku first.
    if ($wife === "megumi") {
        $flag = file_get_contents("/flag/otaku");
        echo "<br>The flag is:<br><b>$flag</b>";
    }
} 


?>
<hr>
Otaku <?= $secret ?> you.
