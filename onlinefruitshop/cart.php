<?php
	
	session_start();
	require_once "./functions/database_functions.php";
	require_once "./functions/cart_functions.php";

	// book_isbn got from form post method, change this place later.
	if(isset($_POST['fruitid'])){
		$fruit_id = $_POST['fruitid'];
	}

	if(isset($fruit_id)){
		// new iem selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that bookisbn => qty
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$fruit_id])){
			$_SESSION['cart'][$fruit_id] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$fruit_id]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each bookisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $id =>$qty){
			if($_POST[$id] == '0'){
				unset($_SESSION['cart']["$id"]);
			} else {
				$_SESSION['cart']["$id"] = $_POST["$id"];
			}
		}
	}

	// print out header here
	$title = "Your shopping cart";
	require "./template/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
   	<form action="cart.php" method="post">
	   	<table class="table">
	   		<tr>
	   			<th>Item</th>
	   			<th>Price</th>
	  			<th>Quantity</th>
	   			<th>Total</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['cart'] as $id => $qty){
					$conn = db_connect();
					$fruit = mysqli_fetch_assoc(getfruitById($conn, $id));
			?>
			<tr>
				<td><?php echo $fruit['fname'] . " by " . $fruit['prod']; ?></td>
				<td><?php echo "$" . $fruit['_price']; ?></td>
				<td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $id; ?>"></td>
				<td><?php echo "$" . $qty * $fruit['_price']; ?></td>
			</tr>
			<?php } ?>
		    <tr>
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th><?php echo $_SESSION['total_items']; ?></th>
		    	<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		    </tr>
	   	</table>
	   	<input type="submit" class="btn btn-primary" name="save_change" value="Save Changes">
	</form>
	<br/><br/>
	<a href="checkout.php" class="btn btn-primary">Go To Checkout</a> 
	<a href="fruits.php" class="btn btn-primary">Continue Shopping</a>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some fruits in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>