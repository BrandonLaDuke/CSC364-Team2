<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

if (isset($_POST['AddToCart'])) {

  require 'dbh.inc.php';

  if (isset($_SESSION['cart'])) {
    $item_array_id = array_column($_SESSION["cart"], "item_id");
    if (!in_array($_GET["id"], $item_array_id)) {
      $count = count($_SESSION["cart"]);
      $item_array = array(
        'gameId' => $_GET["id"],
        'gameTitle' => $_POST["gameTitle"],
        'price' => $_POST["price"]
      );
      $_SESSION["cart"][$count] = $item_array;


      header("Location: ../cart.php");
      exit();
    } else {
      echo '<script>alert("Item Already Item")</script>';
      header("Location: ../index.php");
      exit();
    }
  } else {
    $item_array = array(
      'gameId' => $_GET["id"],
      'gameTitle' => $_POST["gameTitle"],
      'price' => $_POST["price"]
    );
    $_SESSION["cart"][0] = $item_array;
    header("Location: ../cart.php");
    exit();
  }

} else {
  header("Location: ../index.php");
  exit();
}
