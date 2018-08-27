<h3>EasyEcho</h3>
<form>
    <input autofocus type="text" name="word" placeholder="word">
</form>
<hr>

<?php

    $word = $_GET["word"];
    
    // Stop using these things, ok?
    $bad = [';', '&', '|', '*', '$', '`', 'cat', 'flag'];

    if ($word) {
        $good = str_replace($bad, '', $word);
        $command = "echo $good";
        echo "<pre>$command</pre><hr>";
        system($command);
    } else {
        highlight_file(__FILE__);
    }
