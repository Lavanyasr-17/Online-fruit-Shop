<?php
  session_start();
  $fruit_id = $_GET['fruitid'];
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM fruits WHERE fid = '$fruit_id'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty ";
    exit;
  }

  $title = $row['fname'];
  require "./template/header.php";
?>
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="fruits.php">Fruits</a> > <?php echo $row['fname']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Fruit Description</h4>
          <p><?php echo $row['_descr']; ?></p>
          <h4>Fruit Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "_descr" || $key == "_image" || $key == "publisherid" || $key == "fname"){
                continue;
              }
              switch($key){
                case "fid":
                  $key = "ID";
                  break;
                case "fname":
                  $key = "Name";
                  break;
                case "prod":
                  $key = "Place where it's produced";
                  break;
                case "_price":
                  $key = "Price";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="fruitid" value="<?php echo $fruit_id;?>">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php
  require "./template/footer.php";
?>