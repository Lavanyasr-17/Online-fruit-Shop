<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4Latest($conn);
  $row1 = select4($conn);
?>
      <!-- Example row of columns -->
      <p class="lead text-center text-muted" style="color:#FF0000">Best Sellers</p>
      <div class="row">
        <?php foreach($row as $fruit) { ?>
      	<div class="col-md-3">
      		<a href="fruit.php?fruitid=<?php echo $fruit['fid']; ?>">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $fruit['_image']; ?>">
          </a>
      	</div>
        <?php } ?>
      </div>
<p class="lead text-center text-muted"  style="color:#FF0000";>Featured</p>
      <div class="row1">
        <?php foreach($row1 as $fruit) { ?>
      	<div class="col-md-3">
      		<a href="fruit.php?fruitid=<?php echo $fruit['fid']; ?>">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $fruit['_image']; ?>">
          </a>
      	</div>
        <?php } ?>
      </div>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>