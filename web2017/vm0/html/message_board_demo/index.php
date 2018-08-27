<?php
require_once("init.php");
$messages = $db->query("SELECT * FROM messages ORDER BY id DESC");
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Message Board</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="page-header" onclick="location.reload();">
        <h1>Message Board <small><a href="source.zip">Download the source code</a></small></h1>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
<?php
if($name) {
?>
            <form action="message.php" method="post">
              <div class="input-group">
                <span class="input-group-addon">Logged in as <?= $name ?>, <a href="user.php?logout">logout</a></span>
                <input type="text" name="message" class="form-control" autofocus autocomplete="off" placeholder="What do you want to say?">
                <div class="input-group-btn">
                  <input type="submit" value="Post" class="btn btn-primary">
                </div>
              </div>
            </form>
<?php
} else {
?>
            <form action="user.php?login" method="post">
              <div class="input-group">
                <span class="input-group-addon">Name</span>
                <input type="text" name="name" class="form-control" autofocus autocomplete="off" placeholder="What is your name?">
                <span class="input-group-addon">Password</span>
                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="What is your password?">
                <div class="input-group-btn">
                  <input type="submit" value="Login" class="btn btn-success">
                </div>
              </div>
            </form>
<?php
}
?>
        </div>
        <div class="panel-body">
          <ul class="list-group">
<?php
while($row = $messages->fetchArray(SQLITE3_ASSOC)) {
    $label = "#"
           . $row['id']
           . " "
           . $row['author']
           . " at "
           . date("Y-m-d H:i:s", $row['time']);
?>
              <li class="list-group-item">
                <h4><span class="label label-info"><?= $label ?></span></h4>
                <?= $row['message'] ?>
              </li>
<?php
}
?>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
