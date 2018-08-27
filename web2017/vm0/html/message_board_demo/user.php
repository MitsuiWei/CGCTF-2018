<?php
require_once("init.php");

$name = $_POST["name"];
$password = $_POST["password"];

if (isset($_GET["login"]) && $name && $password) {
    $name = (string) $name;
    $password = (string) $password;

    $stmt = $db->prepare("SELECT * FROM users WHERE name=:name");
    $stmt->bindValue(":name", $name, SQLITE3_TEXT);
    $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
    
    if ($result) {
        if (sha1($password) === $result["password"]) {
            $_SESSION['name'] = $name;
        } else {
            $_SESSION['name'] = "";
            header("Refresh: 1; url=.");
            die("Login failed, redirecting...");
        }
    }

    else {
        $stmt = $db->prepare("INSERT INTO users VALUES (NULL, :name, :password)");
        $stmt->bindValue(":name", (string) $name, SQLITE3_TEXT);
        $stmt->bindValue(":password", sha1((string) $password), SQLITE3_TEXT);
        $stmt->execute();

        $_SESSION["name"] = $name;
    }
}

else if (isset($_GET["login"])) {
    $_SESSION['name'] = "";
    header("Refresh: 1; url=.");
    die("Login failed, redirecting...");
}

else if (isset($_GET["logout"])) {
    $_SESSION["name"] = "";
}

header("Location: .");

