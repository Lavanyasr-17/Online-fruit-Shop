<?php
	session_start();
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "SELECT * FROM publisher ORDER BY publisherid";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty publisher ! Something wrong! check again";
		exit;
	}

	$title = "List Of Producers";
	require "./template/header.php";
?>
	<p class="lead">List of Producers</p>
	<ul>
	<?php 
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT publisherid FROM fruits";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($pubInBook = mysqli_fetch_assoc($result2)){
				if($pubInBook['publisherid'] == $row['publisherid']){
					$count++;
				}
			}
	?>
		<li>
			<span class="badge"><?php echo $count; ?></span>
		    <a href="fruitPerPub.php?pubid=<?php echo $row['publisherid']; ?>">
			<img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['picture']; ?>">
		<?php echo $row['publisher_name']; ?></a>
		</li>
			
	<?php } ?>
		<li>
			<a href="fruits.php">List full of Fruits</a>
		</li>
	</ul>
<?php
	mysqli_close($conn);
	require "./template/footer.php";
?>