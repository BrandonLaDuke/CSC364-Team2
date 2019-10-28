<?php require "header.php"; ?>
<main>
  <?php if (isset($_SESSION['userId'])) { ?>
    <p class="login-status">You are logged in</p>
  <?php } else { ?>
    <p class="login-status">You are logged out</p>
  <?php } ?>
</main>
<?php require "footer.php"; ?>
