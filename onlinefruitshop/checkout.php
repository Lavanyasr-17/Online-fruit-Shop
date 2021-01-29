<?php
	
	session_start();
	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Checking out";
	require "./template/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
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
			<td><?php echo $qty; ?></td>
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
	<form method="post" action="purchase.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
			<p class="text-danger">All fields have to be filled</p>
			<?php } ?>
		<div class="form-group">
			<label for="name" class="control-label col-md-4">Name</label>
			<div class="col-md-4">
				<input type="text" name="name" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="mail" class="control-label col-md-4">Email</label>
			<div class="col-md-4">
				<input type="email" name="mail" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="control-label col-md-4">Phone number</label>
			<div class="col-md-4">
				<input type="tel" name="phone" class="col-md-4" pattern="[1-9]{1}[0-9]{9}" class="form-control">
				
				
			</div>
			
		</div>
			
		<div class="form-group">
			<label for="address" class="control-label col-md-4">Address</label>
			<div class="col-md-4">
				<input type="text" name="address" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="city" class="control-label col-md-4">City</label>
			<div class="col-md-4">
				<input type="text" name="city" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="zip_code" class="control-label col-md-4">Pin Code</label>
			<div class="col-md-4">
				<input type="tel" name="zip_code" class="col-md-4" pattern="[1-9]{1}[0-9]{5}" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="country" class="control-label col-md-4">Country</label>
			<div class="col-md-4">
				<input type="text" name="country" class="col-md-4" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Purchase" class="btn btn-primary">
		</div>

	</form>
	
	<p class="lead">Please press Purchase to confirm your purchase, or Continue Shopping to add or remove items.</p>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some fruits in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>