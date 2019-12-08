<?php require "header.php"; ?>

<main>
  <section>
    <h1>Signup</h1>
    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo '<p class="error" augmented-ui="tl-clip br-clip exe">Oops, that didn\'t work... Fill in all fields please.</p>';
        $userN = $_GET['uid'];
        $emailN = $_GET['mail'];
      } else if ($_GET['error'] == "invaliduidmail") {
        echo '<p class="error" augmented-ui="tl-clip br-clip exe">Uh, oh. Invalid username and e-mail.</p>';
      } else if ($_GET['error'] == "invaliduid") {
        echo '<p class="error" augmented-ui="tl-clip br-clip exe">Hmm... invalid username.</p>';
        $emailN = $_GET['mail'];
      } else if ($_GET['error'] == "invalidmail") {
        echo '<p class="error" augmented-ui="tl-clip br-clip exe">Oopsie... invalid e-mail.</p>';
        $userN = $_GET['uid'];
      } else if ($_GET['error'] == "passwordcheck") {
        echo '<p class="error" augmented-ui="tl-clip br-clip exe">Looks like your passwords do not match.</p>';
        $userN = $_GET['uid'];
        $emailN = $_GET['mail'];
      } else if ($_GET['error'] == "usertaken") {
        echo '<p class="error" augmented-ui="tl-clip br-clip exe">Aww, that username has already been claimed.</p>';
      }
    } else if ($_GET['signup'] == "success") {
      echo '<p class="db-success" augmented-ui="tl-clip br-clip exe">Yay! Signup successful!</p>';
    }?>
    <form class="signup" action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username" value="<?php echo $userN; ?>">
        <input type="text" name="mail" placeholder="E-mail" value="<?php echo $emailN ?>">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Repeat password">
        <button type="submit" name="signup-submit">Signup</button>
    </form>
  </section>
</main>


<?php require "footer.php"; ?>
