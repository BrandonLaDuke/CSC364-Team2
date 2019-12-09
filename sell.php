<?php require "header.php"; ?>
<main>
  <h1 class="head-txt">Sell Games</h1>
  <?php if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
      echo '<p class="error" augmented-ui="tl-clip br-clip exe">Oops, that didn\'t work... Fill in all fields please.</p>';
      $gametitle = $_GET['gametitle'];
      $publisher = $_GET['publisher'];
      $price = $_GET['price'];
      $inventory = $_GET['inventory'];
      $details = $_GET['details'];
    } elseif ($_GET['error'] == "sqlerror") {
      echo '<p class="error" augmented-ui="tl-clip br-clip exe">An error has occured within our database. Please contact us and let us know any details that might have caused this error.</p>';
    }
  } elseif ($_GET['savegame'] == "success") {
    echo '<p class="db-success" augmented-ui="tl-clip br-clip exe">Yay! Your game has been added to the store.</p>';
  }?>
  <?php if (isset($_SESSION['userId'])) { ?>
    <form class="edit-game" action="includes/sellgame.inc.php" method="post" enctype="multipart/form-data">
      <label for="gametitle">Game Title</label>
      <input id="gametitle" type="text" name="gametitle" placeholder="e.g. Pokemon: Red Version" value="<?php echo $gametitle; ?>">
      <label for="publisher">Publisher</label>
      <input id="publisher" type="text" name="publisher" placeholder="e.g. Nintendo of America" value="<?php echo $publisher; ?>">
      <p>Platforms:</p>
      <div class="platforms">

        <div>
          <?php $sql = "SELECT * FROM platforms;";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
              <input type="radio" id="<?php echo $row['idPlatform']; ?>" name="platform" value="<?php echo $row['name']; ?>">
              <label for="<?php echo $row['idPlatform']; ?>"><?php echo $row['developer'] . " " . $row['name']; ?></label><br>
      <?php }?>

        <?php } ?>
        </div>
      </div>
      <label for="coverart">Upload Cover Art</label>
      <input augmented-ui="br-clip exe" type="file" name="coverart" value="">

      <label>Select a rating:</label>
      <div class="rating">
        <div>
          <input type="radio" id="ec" name="rating" value="Early Childhood">
          <label for="ec">Early Childhood</label>
        </div>

        <div>
          <input type="radio" id="e" name="rating" value="Everyone">
          <label for="e">Everyone (originally known as “K-A” for kids to adults)</label>
        </div>

        <div>
          <input type="radio" id="e10" name="rating" value="Everyone 10+">
          <label for="e10">Everyone 10+</label>
        </div>

        <div>
          <input type="radio" id="t" name="rating" value="Teen">
          <label for="t">Teen</label>
        </div>

        <div>
          <input type="radio" id="m" name="rating" value="Mature 17+">
          <label for="m">Mature 17+</label>
        </div>

        <div>
          <input type="radio" id="ao" name="rating" value="Adults Only 18+">
          <label for="ao">Adults Only 18+</label>
        </div>

        <div>
          <input type="radio" id="rp" name="rating" value="Rating Pending">
          <label for="rp">Rating Pending</label>
        </div>
      </div>
      <label for="price">Price: </label>
      <input id="price" type="text" name="price" placeholder="e.g. 29.99" value="<?php echo $price; ?>">
      <input style="display:none;" id="inventory" type="text" name="inventory" placeholder="e.g. 5" value="1">
      <label for="details">Description/Information: </label>
      <textarea id="details" name="details" placeholder="Provide details like the description or any other info." rows="8" cols="80"><?php echo $details; ?></textarea>
      <br>
      <input style="display:none;" type="text" name="uID" value="<?php echo $_SESSION['userId'] ?>">
      <input style="display:none;" type="text" name="wallet" value="<?php echo $_SESSION['wallet']; ?>">
      <button augmented-ui="br-clip exe" type="submit" name="sell-game-submit">Sell Game</button>
    </form>
  <?php } else { ?>
    <h1>Please login to sell games.</h1>
  <?php  } ?>
</main>
<?php require "footer.php"; ?>
