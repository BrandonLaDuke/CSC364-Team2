<?php
//INSERT INTO `platforms` (`idPlatform`, `developer`, `name`, `type`) VALUES ('1', 'Sony Interactive Entertainment', 'PlayStation 3', 'Home video game console');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

if (isset($_POST['sell-game-submit'])) {

  require 'dbh.inc.php';

  $gametitle = $_POST['gametitle'];
  $publisher = $_POST['publisher'];
  $platform = $_POST['platform'];
  $rating = $_POST['rating'];
  $price = $_POST['price'];
  $inventory = $_POST['inventory'];
  $details = $_POST['details'];
  $userID = $_POST['uID'];
  $wallet = $_POST['wallet'];

  $coverart = $_FILES['coverart'];
  $coverartName = $coverart['name'];
  $coverartTmpName = $coverart['tmp_name'];
  $coverartSize = $coverart['size'];
  $coverartError = $coverart['error'];
  $coverartType = $coverart['type'];

  $fileExt = explode('.', $coverartName);
  $coverartActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');
  if (empty($gametitle) || empty($publisher) || empty($platform) || empty($rating) || empty($price) || empty($inventory) || empty($details)) {
    header("Location: ../sell.php?error=emptyfields");
    exit();
  } else {
    $sql = "INSERT INTO games (gameTitle, publisher, platform, rating, price, inventory, details, coverArtURL) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../sell.php?error=sqlerror");
      exit();
    } else {
      if (in_array($coverartActualExt, $allowed)) {
        if ($coverartError === 0) {
          if ($coverartSize < 1000000) {
            $fileNameNew = uniqid('', true).".".$coverartActualExt;
            $fileDestination = '../uploads/'.$fileNameNew;
            move_uploaded_file($coverartTmpName, $fileDestination);
            $coverArtUrl = 'http://sullivan.brandonladuke.net/csc364/uploads/'.$fileNameNew;
            // $coverArtUrl = 'http://localhost/sullivan/csc364-Team2/uploads/'.$fileNameNew;
          } else {
            echo "Wow! Your file is too big!";
          }
        } else {
          echo "huh, There was an error uploading your file.";
        }
      } else {
        echo "You can  not upload files of this type.";
      }
      mysqli_stmt_bind_param($stmt, "ssssdiss", $gametitle, $publisher, $platform, $rating, $price, $inventory, $details, $coverArtUrl);
      mysqli_stmt_execute($stmt);


      $walletUpdate = $wallet + $price;

      $_SESSION['wallet'] = $walletUpdate;
      $sqlu = "UPDATE users SET wallet = $walletUpdate WHERE idUsers = $userID";
      $stmt2 = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt2, $sqlu)) {
        header("Location: ../sell.php?error=sqlerror?$walletUpdate?$userID");
        exit();
      } else {
        mysqli_stmt_execute($stmt2);
        $_SESSION['wallet'] = $walletUpdate;
      header("Location: ../sell.php?sell_game=success");
      }
    }
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
