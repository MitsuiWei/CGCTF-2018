<?php
require_once("init.php");

// Redirect
header("Location: index.php");

$author = $_SESSION["name"];
if (!$author)
    return;

$message = $_POST["message"];
if ($message && $author) {
    $stmt = $db->prepare("INSERT INTO messages VALUES (NULL, :author, :time, :message)");
    $stmt->bindValue(":author", $author, SQLITE3_TEXT);
    $stmt->bindValue(":time", time(), SQLITE3_INTEGER);
    $stmt->bindValue(":message", $message, SQLITE3_TEXT);
    $stmt->execute();

    // Maximum 50 messages
    while ($db->querySingle("SELECT COUNT(*) FROM messages") > 50)
        $db->exec("DELETE FROM messages WHERE id IN (SELECT id FROM messages LIMIT 1)");
}

