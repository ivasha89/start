<?php
$usrstr = ' (Гость)';
$appname = 'Задачник';
$loggedin = false;
session_start();
if (isset($_SESSION['admin'])) {
	$loggedin = true;
	$usrstr   = " Модератор";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport"
			content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">
		<title>
			<?php echo$appname . $usrstr;?>
		</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar sticky-top navbar-expand-md navbar-light shadow mb-2"  style="background-color:#152542">
	<a class="navbar-brand  text-light" href="index.php">
			<img src="/images/beejee.png" width="35" hight="35" class="rounded d-inline-block align-top" alt="">
		<?php echo "К задачнику"?>
	</a>
	<?php
		require_once '../view/nav_bar.php';
	?>
	</nav>
