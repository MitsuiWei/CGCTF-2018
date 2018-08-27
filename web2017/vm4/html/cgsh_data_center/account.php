<?php
require_once("utils/inc.php");
$title .= " | Account";

$username = isset($_POST['username']) ? $_POST['username'] : NULL;
$password = isset($_POST['password']) ? $_POST['password'] : NULL;

if ($username && $password) {
  $result = db_one("SELECT * FROM users WHERE username=? AND password=?", [$username, md5($password)]);
  if (isset($result['id'])) {
    $usersess = ["id"=>$result['id'], "username"=>$result['username']];
    setcookie("USERINFO", base64_encode(serialize($usersess)));
    $_SESSION['login'] = true;
    mes("login sucessfully");
  } else {
    $_SESSION['login'] = false;
    mes("login failed as $username");
  }
} else if (isset($_POST['logout'])) {
  $_SESSION['login'] = false;
  mes("logout");
}
?>

<?php include("utils/header.php"); ?>
  <div id="content-wrapper">
    <div id="content">
      <?php if(isset($_SESSION['login']) && $_SESSION['login']) {
            $result = db_all("SELECT * FROM data WHERE owner_id=?", [$usersess['id']]);?>
        <h4>My Secrets</h4>
        <style>
          table,th,td { color: white; border-collapse: collapse; border: 1px solid white; }
          th,td { padding: 10px; }
        </style>
        <table>
          <tr>
            <th>Secret name</th>
            <th>Secret content</th>
          </tr>
          <?php foreach($result as $record) { ?>
            <tr>
              <th><?=$record['data_name']?></th>
              <td><?=$record['data_content']?></td>
            </tr>
          <?php } ?>
        </table>
      <?php } else { ?>
        <h4>Login to view your secrets!</h4>
      <?php } ?>
    </div>
  </div>
  <div id="sidebar-wrapper">
    <div id="sidebar">
      <?php if (isset($_SESSION['login']) && $_SESSION['login']) { ?>
        <h1>Hello <?=$usersess['username']?>! (id=<?=$usersess['id']?>)</h1>
        <h3>'admin' knows flag2!</h3>
        <?php if($usersess['username'] == 'admin') {
          mes("get admin's secrets");
        } ?>
        <form method="POST"><input type="submit" value="Logout" name="logout"></form>
      <?php } else { ?>
        <h3>Login</h3>
        <form method="POST">
          <label>username</label><br>
          <input type="text" name="username"><br><br>
          <label>password</label><br>
          <input type="password" name="password"><br><br>
          <input type="submit" value="Login">
          <a href="#">Register</a><br><br><br><br>
        </form>
      <?php } ?>
    </div>
  </div>
<?php include("utils/footer.php"); ?>
