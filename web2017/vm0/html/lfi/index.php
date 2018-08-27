<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="container">
    <h1 class="pager-header">LFI</h1>
    <div>
        <a href=".">home</a> |
        <a href="?page=index.html">index</a> |
        <a href="?page=hint.html">hint</a> |
        <a href="flag.php">flag</a>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php
            if (!isset($_GET["page"]) || $_GET["page"] === "index.php") {
                echo "Home page";
            } else {
                echo file_get_contents($_GET["page"]);
            }
            ?>
        </div>
    </div>
</div>

