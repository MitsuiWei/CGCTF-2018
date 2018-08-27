<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="container">
<h3>Secret Place</h3>
<hr>
<?php
$db = new SQLite3("/db");

$username = $_POST["username"];
$password = $_POST["password"];

if($username) {
    $q = "SELECT * FROM users WHERE username='$username' AND password='$password';";
    $result = $db->querySingle($q, true);
    echo "<pre>--------------------\n";
    echo "id: ".$result['id'];
    echo "\nusername: ".$result['username'];
    echo "\npassword: ".$result['password'];
    echo "\n--------------------</pre>";
    if($result && $result['username'] === "admin") {
        echo "<pre>You must have been here.\nThis is a SQLite3 database.\nThe flag is somewhere in the database, can you find it?</pre>";
    } else {
        echo "Login failed: <b>$username</b>";
        echo "<script>setTimeout(function(){location.href='_login.php';},2000);</script>";
    }
} else {
    ?>
    
    <form method="POST">
        <div class="form-group">
            <label for="usr">Username:</label>
            <input type="text" class="form-control" id="usr" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="password">
        </div>
        <div class="input-group-btn">
            <input type="submit" value="Login" class="btn btn-primary">
        </div>
    </form>
    <?php
}
?>
</div>

