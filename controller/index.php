<?php
require_once '../view/header.php';
require_once '../model/mysqllogin.php';
require_once '../model/functions.php';

	$limit = 3;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $conn->query("SELECT * FROM tasks LIMIT $start, $limit");

	$result1 = $conn->query("SELECT count(id) AS id FROM tasks");
	$tasksCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $tasksCount[0]['id'];
	$pages = ceil($total / $limit);

	$previous = $page - 1;
	$next = $page + 1;
	if (isset($_POST['name'])) {
		$name = sanitizeString($_POST['name']);
		$email = sanitizeString($_POST['email']);
		$description = sanitizeString($_POST['description']);

		if ($name == "" && $email == "" && $description == "")
			$error = "Обязательные поля не были заполнены";
		else {
			$result = $conn->query("SELECT * FROM tasks WHERE name='$name'");
			$rw = $result->num_rows;
			if ($rw)
				$error = "Вы уже создали задачу";
			else {
				$error = "Успешно";
				create($conn, $name, $email, $description);
				die($startErrorShow . "href='index.php'><h4> Дорогой, " . $name . " ваш задача создана</h4>" . $endErrorShow);
			}
		}
	}

	if( isset($_POST['completed']) || isset($_POST['descriptionAdmin']) ){
		$id = $_POST['id'];
		$description = $_POST['descriptionAdmin'];
		$completed = 0;

		if(isset($_POST['completed'])) {
			if ($_POST['completed'] == 'on') {
				header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
				$completed = 1;
			}
		}
		update($conn, $description, $completed, $id);
	}

	if (isset($_GET['sort']))
		$sort = $_GET['sort'];
	else
		$sort = 'ASC';

	if (isset( $_GET['order'])) {
		$order = $_GET['order'];
		$result = order($conn, $order, $sort, $start, $limit);
	}
	else
		$order = 'name';

	$tasks = $result->fetch_all(MYSQLI_ASSOC);

require_once '../view/page.php';
require_once '../view/footer.php'
?>
