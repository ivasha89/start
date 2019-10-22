<?php
$error = "";
$startErrorShow = "<div class='container text-center mb-2'><a class='btn btn-warning'";
$endErrorShow = "</a></div>";

function sanitizeString($var) {
	global $conn;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return $conn->real_escape_string($var);
}

function destroySession() {
	$_SESSION = array();
	if (session_id() != "" || isset($_COOKIE[session_name()]))
	setcookie(session_name(), '', time() + 60*60*24*15, '/');
	session_destroy();
}

function get_post($conn, $var) {
	if (is_array($_POST[$var])) {
		for ($i = 0; $i < count($_POST[$var]); $i++)
			$a[$i] = $conn->real_escape_string($_POST[$var][$i]);
		return $a;
	}
	else 
		return $conn->real_escape_string($_POST[$var]);
}

function create($conn, $var1, $var2, $var3) {					// Функция создания задачи
	global $error;
	$conn->query("INSERT INTO tasks(`name`, email, description) VALUES ('$var1', '$var2', '$var3')");
	if ($conn->error or $conn->connect_error) 
		$error = "Не удалось вставить данные: " . $conn->error;
}

function update($conn, $var1, $var2, $var3) {					// Функция обновления задачи
	global $error;
	$conn->query("UPDATE tasks SET description='$var1', completed='$var2' WHERE id='$var3'");
	if ($conn->error or $conn->connect_error) 
		$error = "Не удалось обновить данные: " . $conn->error;
}

function order($conn, $var, $var1, $var2, $var3) {
    global $error;
    $result = $conn->query("SELECT * FROM tasks ORDER BY $var $var1 LIMIT $var2, $var3");
    if ($conn->error or $conn->connect_error)
        $error = "Не удалось отсортировать данные: " . $conn->error;
    return $result;
}

?>
