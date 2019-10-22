<?php
$hn = 'localhost';
$db = 'test';
$un = 'putty';
$pw = 'JointO453423!';
$conn = new mysqli ($hn, $un, $pw, $db);
$conn->query("SET NAMES utf8mb4");
if ($conn->connect_error) $error = $conn->connect_error;
?>
