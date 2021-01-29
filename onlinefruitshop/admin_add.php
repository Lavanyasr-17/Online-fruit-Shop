<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Add new fruit";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){
		$id = trim($_POST['id']);
		$id = mysqli_real_escape_string($conn, $id);
		
		$names = trim($_POST['names']);
		$names = mysqli_real_escape_string($conn, $names);

		$produ = trim($_POST['produ']);
		$produ = mysqli_real_escape_string($conn, $produ);
		
		$descr = trim($_POST['descr']);
		$descr = mysqli_real_escape_string($conn, $descr);
		
		$price = floatval(trim($_POST['price']));
		$price = mysqli_real_escape_string($conn, $price);
		
		$publisher = trim($_POST['publisher']);
		$publisher = mysqli_real_escape_string($conn, $publisher);

		// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}

		// find publisher and return pubid
		// if publisher is not in db, create new
		$findPub = "SELECT * FROM publisher WHERE publisher_name = '$publisher'";
		$findResult = mysqli_query($conn, $findPub);
		if(!$findResult){
			// insert into publisher table and return id
			$insertPub = "INSERT INTO publisher(publisher_name) VALUES ('$publisher')";
			$insertResult = mysqli_query($conn, $insertPub);
			if(!$insertResult){
				echo "Can't add new publisher " . mysqli_error($conn);
				exit;
			}
			$publisherid = mysql_insert_id($conn);
		} else {
			$row = mysqli_fetch_assoc($findResult);
			$publisherid = $row['publisherid'];
		}


		$query = "INSERT INTO fruits VALUES ('" . $id . "', '" . $names . "', '" . $produ . "', '" . $image . "', '" . $descr . "', '" . $price . "', '" . $publisherid . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_fruit.php");
		}
	}
?>
	<form method="post" action="admin_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ID</th>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><input type="text" name="names" required></td>
			</tr>
			<tr>
				<th>Imported from</th>
				<td><input type="text" name="produ" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"></textarea></td>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" required></td>
			</tr>
			<tr>
				<th>Produced at</th>
				<td><input type="text" name="publisher" required></td>
			</tr>
		</table>
		<input type="submit" name="add" value="Add new fruit" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>