<title>My favorite images</title>
<link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
<style>body{font-family:'Baloo', cursive;}</style>
<h1>My favorite images</h1>
Reload page to shuffle!
<hr>
<?php
$files = array();
foreach (glob("images/*.jpg") as $file) {
    $files[] = $file;
}
$idx = array_rand($files, 1);
echo "<img src=\"${files[$idx]}\">";
?>
