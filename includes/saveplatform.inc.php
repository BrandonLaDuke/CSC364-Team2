<?php
//INSERT INTO `platforms` (`idPlatform`, `developer`, `name`, `type`) VALUES ('1', 'Sony Interactive Entertainment', 'PlayStation 3', 'Home video game console');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

if (isset($_POST['save-game-submit'])) {

  require 'dbh.inc.php';

  $developer = $_POST['developer'];
  $name = $_POST['platformName'];
  $type = $_POST['platformType'];

  if (empty($developer) || empty($name) || empty($type)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  } else {
    $sql = "INSERT INTO platforms (developer, name, type) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../adminpanel-edit-platforms.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "sss", $developer, $name, $type);
      mysqli_stmt_execute($stmt);
      header("Location: ../adminpanel.php?add_platform=success");
      }
    }
  }

mysqli_stmt_close($stmt);
mysqli_close($conn);
