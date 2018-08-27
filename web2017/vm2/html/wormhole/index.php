<?php
$name = $_SERVER["REMOTE_ADDR"];
$name = md5($name.microtime());

$info = "";

if(isset($_FILES["upload"])) {
	$file = $_FILES["upload"];
	if($file["error"] === 0 && $file["size"] <= 1024) {
        $info .= "Upload successfully, ";
        move_uploaded_file($file["tmp_name"], "/tmp/$name");
        exec("echo \"<?php header('Location: /wormhole');\" > uploads/index.php");
        exec("/utils/unzip /tmp/$name -d uploads/$name", $out, $ret);
        if ($ret == 0) {
            exec("cp htaccess uploads/$name/.htaccess");
            $dir = "uploads/$name";
            $info .= "unzipped.";
        } else {
            $info .= "error unzipping.";
        }
    } else {
        $info .= "Invalid file.";
	}
}
?>

<title>CGCTF Dream Uploader</title>

<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">

<style>
    .container {
        font-size: 130%;
        margin: 20px;
        font-family: 'Shadows Into Light';
    }
</style>


<div class="container">
    <h1>CGCTF Dream Uploader</h1>
    <h3>Zip all your dream inside :D</h3>
    <ul>
        <li>You can upload multiple files by adding them to a zip file (&lt; 1 KB).</li>
        <li>I will unzip it and put the files into a directory, and give you a link to access them.</li>
        <li>The flag is somewhere in another universe.</li>
        <li>c = 299792458 m/s</li>
    </ul>
    <?php
    if (isset($_FILES['upload'])) {
        if ($dir) echo "Your files: <a href=\"$dir\">$dir</a>";
        else echo $info;
    }
    ?>
    <form method="post" class="input-group file-caption-main" enctype="multipart/form-data">
        <input type="file" name="upload">
        <input type="submit" value="Upload"> 
    </form>
    <img src="the_starry_night.jpg">
</div>
