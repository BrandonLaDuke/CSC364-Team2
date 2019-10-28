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
        </ul>
      </div>

      <div class="cp-edit">
        <form class="edit-game" action="savegame.inc.php" method="post">
          <label for="gametitle">Game Title</label>
          <input id="gametitle" type="text" name="gametitle" placeholder="e.g. Pokemon: Red Version" value="">
          <label for="publisher">Publisher</label>
          <input id="publisher" type="text" name="publisher" placeholder="e.g. Nintendo of America" value="">
          <p>Platforms:</p>
          <div class="platforms">
            <div>
              <input type="checkbox" id="playstation" name="platform">
              <label for="playstation">PlayStation</label>
            </div>

            <div>
              <input type="checkbox" id="ngc" name="platform">
              <label for="ngc">GameCube</label>
            </div>
          </div>
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
          <input type="text" name="price" placeholder="e.g. 29.99" value="">
          <input type="text" name="inventory" placeholder="e.g. 5" value="">
          <textarea name="details" placeholder="Provide details like the description or any other info." rows="8" cols="80"></textarea>
          <br>
          <button type="submit" name="save-game-submit">Save</button>
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
