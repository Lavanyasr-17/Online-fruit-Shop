<?php
	$fruit_id = $_GET['fruitid'];

	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "DELETE FROM fruits WHERE fid = '$fruit_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "delete data unsuccessfully " . mysqli_error($conn);
		exit;
	}
	header("Location: admin_fruit.php");
?>