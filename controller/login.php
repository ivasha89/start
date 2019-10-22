<?php
require_once '../view/header.php';
require_once '../model/variables.php';
require_once '../model/mysqllogin.php';
require_once '../model/functions.php';

if (isset($_SESSION)) destroySession();
if (isset($_POST['user'])) {
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
	if ($user == "" || $pass == "")
		$error = $startErrorShow . "Не все поля заполнены" . $endErrorShow;
	elseif ($user !== "" || $pass !== "") {
		$result = $conn->query("SELECT password FROM adm WHERE name='$user'");
		if (!$result) 
			$error = $startErrorShow . "href='login.php'>Нет связи с базой данных mysql" . $endErrorShow;
		elseif ($result->num_rows == 0) 
			$error = $startErrorShow . "href='login.php'>Имя/Пароль неверны" . $endErrorShow;
		elseif ($result->num_rows !== 0) {
			$row = $result->fetch_array(MYSQLI_NUM);
			$result->close();
			$salt1 = "gi^r";
			$salt2 = "w&(v";
			$token = hash('ripemd128', "$salt1$pass$salt2");
			if ($token == $row[0]) {
				if (isset($_SESSION))
					session_start();
				$_SESSION['admin'] = $user;
				$_SESSION['check'] = hash('ripemd128',$_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
				if ($_SESSION['check'] != hash('ripemd128',$_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'])) die ($startErrorShow . "href='login.php'>Сессия похищена" . $endErrorShow);
				unset($_SESSION['check']);
				if (!isset($_SESSION['initiated'])) {
					session_regenerate_id();
					$_SESSION['initiated'] = 1;
				}
				$mainPage = substr_replace($_SERVER['PHP_SELF'], 'index.php', -9);
				header("Location: http://".$_SERVER['HTTP_HOST'].$mainPage);
				die;
			}
			else echo $startErrorShow . "href='login.php'>Имя/Пароль неверны" . $endErrorShow;
		}
	}
}
else {
	require_once '../view/login_view.php';
}
echo $error;
$conn->close();
require_once '../view/footer.php';
?>
