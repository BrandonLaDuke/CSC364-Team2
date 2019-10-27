<?php include_once 'includes/dbh.inc.php';
session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retro Gaming Website</title>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/augmented-ui/augmented.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="header-login" augmented-ui="br-clip exe">
      <?php if (isset($_SESSION['userId'])) {
        echo '<form class="logout" action="includes/logout.inc.php" method="post">
            <button type="submit" augmented-ui="br-clip exe" name="logout-submit">Logout</button>
        </form>';
      } else {
        echo '<form class="signin" action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="Email/Username" augmented-ui="br-clip exe">
            <input type="password" name="pwd" placeholder="Password" augmented-ui="br-clip exe">
            <button type="submit" name="login-submit" augmented-ui="br-clip exe">Login</button>
        </form>
        <a href="signup.php" class="header-signup" augmented-ui="br-clip exe">Sign Up</a>';
      } ?>


    </div>
    <div class="wrapper" augmented-ui="tl-clip br-clip tr-clip-x exe">

        <h1 id="logo">Retro Game Store</h1>
        <ul class="menu" augmented-ui="tl-clip br-clip exe">
          <a href="#"><li augmented-ui="tl-clip br-clip exe">Home</li></a>
          <a href="#"><li augmented-ui="tl-clip br-clip exe">Buy</li></a>
          <a href="#"><li augmented-ui="tl-clip br-clip exe">Sell</li></a>
          <a href="#"><li augmented-ui="tl-clip br-clip exe">FAQ</li></a>
          <a href="#"><li augmented-ui="tl-clip br-clip exe">Contact Us</li></a>
        </ul>
