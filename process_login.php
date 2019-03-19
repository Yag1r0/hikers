<?php
session_start();
include("config/config.php");
//definisemo varijable
$username = !empty($_POST['username']);
$password = !empty($_POST['password']);

//provera da li su prazne
if($username && $password) {
	$db = mysqli_connect(SERVER, USER, PASS,DB);
	//promenimo enkodiranje na utf-8
	mysqli_set_charset($db, "utf-8");
	//ubacimo sigurni username unutar sql-a
	$sql = sprintf("SELECT * FROM users WHERE username='%s'", mysqli_real_escape_string($db, $_POST['username']));
	/*
	$sql = sprintif("SELECT * FROM users WHERE username='%s' or email='%s'", mysqli_real_escape_string($db, $_POST['username'], mysqli_real_escape_string($db, $_POST['email'])); */

	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	if($row) {
		$hash = $row['password'];

if(password_verify($_POST['password'], $hash)) {
	$message = 'Login successful.';

	$_SESSION['user'] = $row['username'];
	$_SESSION['uid'] = $row['uid'];
	$_SESSION['image'] = $row['img'];
	$_SESSION['name'] = $row['name'];
	$_SESSION['lastname'] = $row['lastname'];

	header("Location: dashboard.php");
	} else {
		//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		setcookie("poruka", "pogresna lozinka", time()+(86400), "/");
		header('Location: index.php');

	}
} else {
	setcookie("poruka", "Pogresni podaci", time()+(86400), "/");
	header('Location: index.php');
}
 mysqli_close($db);
} else {
	setcookie("poruka", "Niste popunili sva polja", time()+(86400), "/");
	header('Location: index.php');
}

?>
