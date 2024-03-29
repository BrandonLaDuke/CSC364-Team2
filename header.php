<?php include_once 'includes/dbh.inc.php';
session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Retro Game Store</title>

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/augmented-ui@1/augmented.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <?php if (isset($_GET['error'])) {
      if ($_GET['error'] == "wrongpwd") {
        echo '<script>alert("Password is incorrect.");</script>';
      } elseif ($_GET['error'] == "nouser") {
        echo '<script>alert("There is no user with that username or email. Signup to create an account.");</script>';
      }
    } ?>
    <div class="header-login" augmented-ui="br-clip exe">
      <?php if (isset($_SESSION['userId'])) { ?>
        <p class="welcome-msg">Welcome, <?php echo $_SESSION['userUid']; ?>! &nbsp; Wallet Ballance: $<?php echo $_SESSION['wallet']; ?></p>
  <?php if ($_SESSION['admin']) { ?>
          <a class="cp-btn" augmented-ui="br-clip exe" href="adminpanel.php">Control Panel</a>
  <?php } ?>
          <a class="cart-btn" augmented-ui="br-clip exe" href="cart.php">My Cart</a>
          <form class="logout" action="includes/logout.inc.php" method="post">
              <button type="submit" augmented-ui="br-clip exe" name="logout-submit">Logout</button>
          </form>
  <?php } else { ?>
  <?php
  // TODO: Echo Errors
     ?>
        <!-- <p class="welcome-msg"> echo $_SESSION['userUid']; </p> -->
        <form class="signin" action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="Email/Username" augmented-ui="br-clip exe">
            <input type="password" name="pwd" placeholder="Password" augmented-ui="br-clip exe">
            <button type="submit" name="login-submit" augmented-ui="br-clip exe">Login</button>
        </form>
        <a href="signup.php" class="header-signup" augmented-ui="br-clip exe">Sign Up</a>
 <?php  } ?>


    </div>
    <div class="wrapper" augmented-ui="tl-clip br-clip tr-clip-x exe">

        <h1 id="logo">Retro Game Store</h1>
        <ul class="menu" augmented-ui="tl-clip br-clip exe">
          <a href="index.php"><li augmented-ui="tl-clip br-clip exe">Home</li></a>
          <a href="about.php"><li augmented-ui="tl-clip br-clip exe">About Us</li></a>
          <a href="buy.php"><li augmented-ui="tl-clip br-clip exe">Buy</li></a>
          <a href="sell.php"><li augmented-ui="tl-clip br-clip exe">Sell</li></a>
          <a href="faq.php"><li augmented-ui="tl-clip br-clip exe">FAQ</li></a>
          <a href="contact.php"><li augmented-ui="tl-clip br-clip exe">Contact Us</li></a>
        </ul>
