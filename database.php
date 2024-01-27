<?php

// create db credentials
$DB_HOST = 'localhost';
$DB_NAME = 'quiz_db';
$DB_USER = 'root';
$DB_PASS = '';

// create mysqli handle
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// error handler
if ($mysqli->connect_error) {
    printf('Connection failed: %s\n', $mysqli->connect_error);
    exit();
}