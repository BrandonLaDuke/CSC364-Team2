<?php require "header.php"; ?>
<main>
  <?php if (isset($_SESSION['userId']) && $_SESSION['admin']) { ?>

    <!-- Admin page start -->

    <section class="control-panel">
      <div class="cp-nav">
        <ul>
          <li><a href="adminpanel.php">Control Panel Home</a></li>
          <li><a href="adminpanel-edit-games.php">Edit Games</a></li>
          <li><a href="adminpanel-edit-platforms.php">Edit Platforms</a></li>
        </ul>
      </div>

      <div class="cp-ga-games">
        <table>
          <!-- Get list of games -->
        </table>
      </div>

      <div class="cp-ga-users">
        <table>
          <!-- Get list of users -->
        </table>
      </div>
    </section>




    <!-- Admin page end -->

  <?php } else {
          header("Location: index.php");
          exit();
        } ?>
</main>
<?php require "footer.php"; ?>
