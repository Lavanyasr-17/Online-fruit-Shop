<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "Edit fruit";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['fruitid'])){
		$fruit_id = $_GET['fruitid'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($fruit_id)){
		echo "Empty id! check again!";
		exit;
	}

	// get book data
	$query = "SELECT * FROM fruits WHERE fid = '$fruit_id'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_fruit.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ID</th>
				<td><input type="text" name="id" value="<?php echo $row['fid'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><input type="text" name="names" value="<?php echo $row['fname'];?>" required></td>
			</tr>
			<tr>
				<th>Produced at</th>
				<td><input type="text" name="produ" value="<?php echo $row['prod'];?>" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"><?php echo $row['_descr'];?></textarea>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" value="<?php echo $row['_price'];?>" required></td>
			</tr>
			<tr>
				<th>Producer</th>
				<td><input type="text" name="publisher" value="<?php echo getPubName($conn, $row['publisherid']); ?>" required></td>
			</tr>
			
		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
	<a href="admin_fruit.php" class="btn btn-success">Confirm</a>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>