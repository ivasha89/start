<?php
require_once '../view/header.php';
require_once '../model/mysqllogin.php';
require_once '../model/functions.php';
$thisTask['id'] = $_GET['id'];
$result = $conn->query("SELECT * FROM tasks WHERE id = '".$thisTask['id']."' ");
$task = $result->fetch_array(MYSQLI_ASSOC);
require_once '../view/task.php';
require_once '../view/footer.php';
?>