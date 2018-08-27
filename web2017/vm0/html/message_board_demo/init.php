<?php
date_default_timezone_set('Asia/Taipei');
session_start();

$db = new SQLite3("board.db");

$db->exec("
CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    author TEXT NOT NULL,
    time INTEGER NOT NULL,
    message TEXT NOT NULL
)");

$db->exec("
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    password TEXT NOT NULL
)");

