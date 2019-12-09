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
        <h1 class="head-txt">Add Frequently Asked Questions</h1>
        <?php if (isset($_GET['error'])) {
          if ($_GET['error'] == "emptyfields") {
            echo '<p class="error" augmented-ui="tl-clip br-clip exe">Oops, that didn\'t work... Fill in all fields please.</p>';
            $q = $_GET['q'];
            $a = $_GET['a'];
          } elseif ($_GET['error'] == "sqlerror") {
            echo '<p class="error" augmented-ui="tl-clip br-clip exe">An error has occured within our database. Please contact us and let us know any details that might have caused this error.</p>';
          }
        }?>
        <form class="add-faq" action="includes/addfaq.inc.php" method="post" enctype="multipart/form-data">
          <label for="q">Question:</label>
          <br>
          <input id="q" type="text" name="q" placeholder="e.g. Why are there sunflower seeds in my account?" value="<?php echo $q; ?>">
          <br><br>
          <label for="a">Answer:</label>
          <br>
          <textarea id="a" type="text" name="a" placeholder="Because you have a hamster silly, remember?" value=""><?php echo $a; ?></textarea>
          <br><br>
          <button type="submit" name="add-faq" augmented-ui="tl-clip br-clip exe">Save</button>
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
