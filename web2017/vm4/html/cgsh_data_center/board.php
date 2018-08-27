<?php
require_once("utils/inc.php");

$title .= " | Board";
if(isset($_POST['message']) && strlen($_POST['message']) > 0 && strlen($_POST['message']) < 60) {
  $message = $_POST['message'];
  $author = $_SESSION['login'] ? $usersess['username'] : "guest";
  db_exec("INSERT INTO board VALUES (NULL, ?, ?)", [$author, $message]);
}

?>
<?php include("utils/header.php"); ?>
  <div id="content-wrapper">
    <div id="content">
      <h4>Messages</h4>
      <?php foreach(db_all("SELECT * FROM board ORDER BY id DESC LIMIT 50") as $record) { ?>
        <div style="display: inline-block; padding: 0px 10px; margin: 5px">
          <dt>Author: <?=$record['author']?></dt>
          <dd><?=$record['content']?></dd>
        </div>
      <?php } ?>
    </div>
  </div>
  <div id="sidebar-wrapper">
    <div id="sidebar">
      <form method="POST">
        <label>Leave a message here!</label><br><br>
        <input autofocus name="message"><br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
<?php include("utils/footer.php"); ?>