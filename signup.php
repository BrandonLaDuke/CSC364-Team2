<?php require "header.php"; ?>

<main>
  <section>
    <h1>Signup</h1>
    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo '<p class="signuperror">Oops, that didn\'t work... Fill in all fields please.</p>';
      } else if ($_GET['error'] == "invaliduidmail") {
        echo '<p class="signuperror">Uh, oh. Invalid username and e-mail.</p>';
      } else if ($_GET['error'] == "invaliduid") {
        echo '<p class="signuperror">Hmm... invalid username.</p>';
      } else if ($_GET['error'] == "invalidmail") {
        echo '<p class="signuperror">Oopsie... invalid e-mail.</p>';
      } else if ($_GET['error'] == "passwordcheck") {
        echo '<p class="signuperror">Looks like your passwords do not match.</p>';
      } else if ($_GET['error'] == "usertaken") {
        echo '<p class="signuperror">Aww, that username has already been claimed.</p>';
      }
    } else if ($_GET['signup'] == "success") {
      echo '<p class="signupsuccess">Yay! Signup successful!</p>';
    } ?>
    <form class="signup" action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="E-mail">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Repeat password">
        <button type="submit" name="signup-submit">Signup</button>
    </form>
  </section>
</main>


<?php require "footer.php"; ?>
