<?php require "header.php"; ?>
<main>
  <?php $sql = "SELECT * FROM games ORDER BY gameTitle;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result); ?>
  <div class="allGames">
<?php if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <a href="gamepage.php?game=<?php echo $row['gameId'] ?>" class="game" augmented-ui="br-clip exe">
            <img class="coverart" src="<?php echo $row['coverArtURL']; ?>" />
            <h3 class="gamename"><?php echo $row['gameTitle']; ?></h3>
            <p class="platform"><?php echo $row['platform']; ?></p>
            <p class="price">$<?php echo $row['price']; ?></p>
          </a>
  <?php }
      } ?>
  </div>
</main>
<?php require "footer.php"; ?>
