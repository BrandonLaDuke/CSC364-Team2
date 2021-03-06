<?php require "header.php"; ?>
<main>
  <?php if (isset($_SESSION['userId']) && $_SESSION['admin']) { ?>

    <!-- Admin Edit Games page start -->

    <section class="control-panel-eg">
      <div class="cp-nav">
        <ul>
          <li><a href="adminpanel.php">Control Panel Home</a></li>
          <li><a href="adminpanel-edit-games.php">Edit Games</a></li>
          <li><a href="adminpanel-edit-platforms.php">Edit Platforms</a></li>
          <li><a href="adminpanel-edit-faq.php">Edit FAQ</a></li>
          <li><a href="adminpanel-documents.php">Project Documents</a></li>
        </ul>
      </div>

      <div class="cp-edit">
        <h1 class="head-txt">Add Game</h1>
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
        <form class="edit-game" action="includes/savegame.inc.php" method="post" enctype="multipart/form-data">
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
          <label for="coverart">Upload Cover Art:</label>
          <input type="file" name="coverart" value="">

          <p>Select a rating:</p>
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
          <label for="inventory">Inventory: </label>
          <input id="inventory" type="text" name="inventory" placeholder="e.g. 5" value="<?php echo $inventory; ?>">
          <label for="details">Description/Information: </label>
          <textarea id="details" name="details" placeholder="Provide details like the description or any other info." rows="8" cols="80"><?php echo $details; ?></textarea>
          <br><br>
          <button type="submit" name="save-game-submit" augmented-ui="tl-clip br-clip exe">Save</button>
        </form>
      </div>
    </section>




    <!-- Admin Edit Games page end -->

  <?php } else {
          header("Location: index.php");
          exit();
        } ?>
</main>
<?php require "footer.php"; ?>
