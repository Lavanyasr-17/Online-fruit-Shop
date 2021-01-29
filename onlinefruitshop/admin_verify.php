<?php
	session_start();
	if(!isset($_POST['submit'])){
		echo "Something wrong! Check again!";
		exit;
	}
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$name = trim($_POST['name']);
	$pass = trim($_POST['pass']);

	if($name == "" || $pass == ""){
		echo "Name or Pass is empty!";
		exit;
	}

	
	if($name != "admin" && $pass != "1234"){
		echo "Name or pass is wrong. Check again!";
		$_SESSION['admin'] = false;
		exit;
	}
	if($name == "admin" && $pass == "1234")
	$_SESSION['admin'] = true;
	header("Location: admin_fruit.php");
?>