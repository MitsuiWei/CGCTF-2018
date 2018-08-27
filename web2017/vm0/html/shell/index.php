<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
$name = sha1($_SERVER["REMOTE_ADDR"] . rand());

$info = "";
$info = "Invalid file.";
$file_name = NULL;
if(isset($_FILES["upload"])) {
    $file = $_FILES["upload"];
    if($file["error"] === 0 && $file["size"] <= 1024*1024*5) {
        $file_name = "upload/$name";
        shell_exec("rm -rf $file_name*");
        $file_name .= strstr($file['name'], ".");
        move_uploaded_file($file["tmp_name"], $file_name);
        $info = "Upload successfully.";
    }
}
?>

<title>Image uploader</title>

<div class="container">
    <h1 class="page-header">Image uploader</h1>
    <?php
    if (isset($_FILES['upload'])) {
        echo "<div>$info</div>";
        if ($file_name)
            echo "<div>Your image: <a href=\"$file_name\">$file_name</a></div>";
    }
    ?>
    <form id="a" method="post" enctype="multipart/form-data">
            <label>Select File</label>
            <input id="b" type="file" name="upload" class="filestyle">
    </form>
    <button id="c" class="btn btn-default">Upload</button>
</div>
<script>
c.onclick = function() {
    if(b.value.endsWith(".jpg"))
        a.submit();
    else
        alert("Invalid file (you can only upload jpg file)");
};
</script>

