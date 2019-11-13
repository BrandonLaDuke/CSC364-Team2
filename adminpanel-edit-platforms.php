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
        </ul>
      </div>

      <div class="cp-edit">
        <form class="edit-platform" action="includes/saveplatform.inc.php" method="post" enctype="multipart/form-data">
          <label for="name">Platform Name</label>
          <input id="name" type="text" name="platformName" placeholder="Genesis" value="">
          <label for="developer">Developer</label>
          <input id="developer" type="text" name="developer" placeholder="SEGA" value="">
          <label for="type">Type:</label>
          <input id="type" type="text" name="platformType" placeholder="Home video game console" value="">
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
