<?php require "includes/header.php"; ?>

<main>
  <section>
    <h1>Signup</h1>
    <form class="signup" action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="E-mail">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Repeat password">
        <button type="submit" name="signup-submit">Signup</button>
    </form>
  </section>
</main>


<?php require "includes/footer.php"; ?>
