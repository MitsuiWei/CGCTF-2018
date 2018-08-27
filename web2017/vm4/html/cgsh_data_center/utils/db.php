<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

/* Tables
mysql -u example_user --password=Admin2015 exampleDB
*/

try {
    $db = new PDO('mysql:host=localhost;dbname=exampleDB', 'example_user', 'Admin2015');
} catch(PDOException $e) {
    die("Connection to database failed: " . $e->getMessage());
}

function db_all($query, $args=[]) {
    global $db;
    $stmt = $db->prepare($query);
    $stmt->execute($args);
    return $stmt->fetchAll();
}

function db_one($query, $args=[]) {
    global $db;
    $stmt = $db->prepare($query);
    $stmt->execute($args);
    return $stmt->fetch();
}

function db_exec($query, $args=[]) {
    global $db;
    $stmt = $db->prepare($query);
    return $stmt->execute($args);
}