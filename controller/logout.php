<?php
require_once '../view/header.php';
require_once '../model/functions.php';
if (!isset($_SESSION)) 
	session_start();

if (!isset($_SESSION['initiated']))
 {
  session_regenerate_id();
  $_SESSION['initiated'] = 1;
 }
if (isset($_SESSION['admin'])) {
	destroySession();
	unset ($_SESSION['admin']);
 }
if (!isset($_SESSION['count'])) $_SESSION['count'] = 0;
else ++$_SESSION['count'];
require_once '../view/logout_view.php';
require_once '../view/footer.php';
?>
