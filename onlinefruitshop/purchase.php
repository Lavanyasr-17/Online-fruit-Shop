<?php
	session_start();
	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: checkout.php");
	} else {
		unset($_SESSION['err']);
	}


	$_SESSION['ship'] = array();
	foreach($_POST as $key => $value){
		if($key != "submit"){
			$_SESSION['ship'][$key] = $value;
		}
	}
	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Purchase";
	require "./template/header.php";
	// connect database
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
		<tr>
			<td>Shipping</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>10.00</td>
		</tr>
		<tr>
			<th>Total Including Shipping</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "$" . ($_SESSION['total_price'] + 10); ?></th>
		</tr>
	</table>
	<form method="post" action="process.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
		<p class="text-danger">All fields have to be filled</p>
		<?php } ?>
        <div class="form-group">
            <label for="card_type" class="col-lg-2 control-label">Type</label>
            <div class="col-lg-10">
              	<select class="form-control" name="card_type">
                  	<option value="VISA">VISA</option>
                  	<option value="MasterCard">Credit card</option>
                  	<option value="American Express">Debit Card</option>
              	</select>
            </div>
        </div>

        <div class="form-group">
            <label for="card_number" class="col-lg-2 control-label">Number</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_number"  pattern="[1-9]{16}">
            </div>
        </div>
        <div class="form-group">
            <label for="card_PID" class="col-lg-2 control-label">CVV</label>
            <div class="col-lg-10">
              	<input type="password" class="form-control" name="card_PID" pattern="[1-9]{1}[0-9]{2}" placeholder="CVV is last 3 digits written behind the card">
            </div>
        </div>
        <div class="form-group">
            <label for="card_expire" class="col-lg-2 control-label">Expiry Date</label>
            <div class="col-lg-4" style="display: flex" >
	<div style="width: 50%">
              	<select class="form-control" name="card_expire">
		<option value="2021">Year</option>
                  	<option value="2021">2021</option>
                  	<option value="2022">2022</option>
                  	<option value="2023">2023</option>
		<option value="2024">2024</option>
                  	<option value="2025">2025</option>
                  	<option value="2026">2026</option>
              	</select>
	</div>
	<div style="flex-grow: 1">
	
              	<select class="form-control" name="card_expire">
		
		<option value="2021">Month</option>
                  	<option value="2021">01</option>
                  	<option value="2022">02</option>
                  	<option value="2023">03</option>
		<option value="2024">04</option>
                  	<option value="2025">05</option>
                  	<option value="2026">06</option>
		<option value="2021">07</option>
                  	<option value="2022">08</option>
                  	<option value="2023">09</option>
		<option value="2024">10</option>
                  	<option value="2025">11</option>
                  	<option value="2026">12</option>
		
              	</select>
	</div>
            </div>
        </div>

        <div class="form-group">
            <label for="card_owner" class="col-lg-2 control-label">Name</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_owner">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              	<button type="reset" class="btn btn-default">Cancel</button>
              	<button type="submit" class="btn btn-primary">Purchase</button>
            </div>
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