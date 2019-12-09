<?php
//INSERT INTO `platforms` (`idPlatform`, `developer`, `name`, `type`) VALUES ('1', 'Sony Interactive Entertainment', 'PlayStation 3', 'Home video game console');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

if (isset($_POST['add-faq'])) {

  require 'dbh.inc.php';

  $question = $_POST['q'];
  $answer = $_POST['a'];
  if (empty($question) || empty($answer)) {
    header("Location: ../adminpanel-edit-faq.php?error=emptyfields&q=".$question."&a=".$answer);
    exit();
  } else {
    $sql = "INSERT INTO faq (question, answer) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../adminpanel-edit-faq.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, "ss", $question, $answer);
      mysqli_stmt_execute($stmt);
      header("Location: ../adminpanel.php?add_faq=success");
      }
    }
  }

mysqli_stmt_close($stmt);
mysqli_close($conn);
