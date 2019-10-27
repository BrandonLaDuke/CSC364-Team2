<?php require "includes/header.php"; ?>

<div class="login">
  <form class="login-admin" action="includes/login.inc.php" method="post">
    <input type="text" name="mailuid" placeholder="Username/Email...">
    <input type="password" name="pwd" placeholder="Password...">
    <button type="submit" name="login-submit">Login</button>
  </form>
  <form class="logout-admin" action="includes/logout.inc.php" method="post">
    <button type="submit" name="logout-submit">Logout</button>
  </form>
</div>
<main>
  <p>You are loged out!</p>
  <p>You are loged in!</p>
</main>

<?php require "includes/footer.php"; ?>
