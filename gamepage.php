<?php require "header.php"; ?>
<main>
<?php
$sql = "SELECT * FROM games ORDER BY gameId;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$match = false;
if ($resultCheck > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['gameId'] == $_GET['game']) {
      $match = true;
      ?>
      <div class="gamepage">
        <div class="title">
          <h1><?php echo $row['gameTitle']; ?></h1>
          <span class="pub"><?php echo $row['publisher']; ?></span>
          <span class="rating">Rated: <?php echo $row['rating']; ?></span>
        </div>
        <div class="coverart">
          <img src="<?php echo $row['coverArtURL']; ?>" alt="Game Art">
        </div>
        <div class="cartinfo">
          <span class="platform">Platform: <?php echo $row['platform']; ?></span>
          <span class="price">$<?php echo $row['price'] ?></span>
          <form class="" action="includes/addtocart.inc.php?id=<?php echo $_GET['game']; ?>" method="post">
            <input name="gameTitle" value="<?php echo $row['gameTitle']; ?>" style="display:none;">
            <input name="price" value="<?php echo $row['price']; ?>" style="display:none;">
            <button augmented-ui="br-clip exe" class="addtocart" type="submit" name="AddToCart">ADD TO CART</button>
          </form>
          <p class="stock">Stock: <?php echo $row['inventory']; ?></p>
        </div>
        <div class="details">
          <h2>Details</h2>
          <p><?php echo $row['details']; ?></p>
        </div>
      </div>
      <?php
    }
  }
}
if ($match === false) {
  header("Location: buy.php");
  exit();
}
?>
</main>
<?php require "footer.php"; ?>
