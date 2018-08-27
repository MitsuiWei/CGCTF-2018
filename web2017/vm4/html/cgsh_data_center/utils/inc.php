<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Taipei');

session_start();
$title = "CGSH Data Center";
$navbar = [
  "Home" => ".",
  "Board" => "board.php",
  "Account" => "account.php"
];

if (isset($_SESSION['count']))
    $_SESSION['count'] = (int) $_SESSION['count'] + 1;
else $_SESSION['count'] = 0;
$count = $_SESSION['count'];

$ip = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d H:i:s");

require("db.php");


function mes($mes) {
    global $date, $ip;
    return db_exec("INSERT INTO log VALUES (NULL, ?)", ["[$date] $ip $mes"]);
}

if(isset($_SESSION['login']) && $_SESSION['login']) {
    if(isset($_COOKIE['USERINFO'])) {
        $temp = base64_decode($_COOKIE['USERINFO']);
        $usersess = unserialize($temp);
        $usersess = db_one("SELECT * FROM users WHERE id=".$usersess['id']);
        $_COOKIE['USERINFO'] = base64_encode(serialize($usersess));
    } else {
        setcookie('USERINFO', base64_encode(serialize($usersess)));
        $usersess = ['username'=>'', 'id'=>''];
    }
} else {
    setcookie('USERINFO', null, -1);
    $_SESSION['login'] = false;
}