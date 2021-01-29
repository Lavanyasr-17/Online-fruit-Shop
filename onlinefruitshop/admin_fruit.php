<?php
	session_start();
	require_once "./functions/admin.php";
	$title = "List fruit";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
	<p class="lead"><a href="admin_add.php">Add new fruit</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Place</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Produced at</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['fid']; ?></td>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['prod']; ?></td>
			<td><?php echo $row['_image']; ?></td>
			<td><?php echo $row['_descr']; ?></td>
			<td><?php echo $row['_price']; ?></td>
			<td><?php echo getPubName($conn, $row['publisherid']); ?></td>
			<td><a href="admin_edit.php?fruitid=<?php echo $row['fid']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?fruitid=<?php echo $row['fid']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>