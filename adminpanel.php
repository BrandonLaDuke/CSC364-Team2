<?php require "header.php"; ?>
<main>
  <?php if (isset($_SESSION['userId']) && $_SESSION['admin']) { ?>

    <!-- Admin page start -->

    <section class="control-panel">
      <div class="cp-nav">
        <ul>
          <li><a href="adminpanel.php">Control Panel Home</a></li>
          <li><a href="adminpanel-edit-games.php">Edit Games</a></li>
          <li><a href="adminpanel-edit-platforms.php">Edit Platforms</a></li>
        </ul>
      </div>

      <div class="cp-ga-info">
        <?php $sql = "SELECT * FROM games;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result); ?>
        <h1>Games</h1>
        <table>
          <?php
          if ($resultCheck > 0) { ?>
              <tr>
                <th>Cover Art</th>
                <th>Game Title</th>
                <th>Publisher</th>
                <th>Platform</th>
                <th>Rating</th>
                <th>Price</th>
                <th>Inventory</th>
                <th>Details</th>
              </tr>
      <?php   while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><img src="<?php echo $row['coverArtURL']; ?>" width="35px" height="50px"/></td>
                <td><?php echo $row['gameTitle']; ?></td>
                <td><?php echo $row['publisher']; ?></td>
                <td><?php echo $row['platform']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
                <td><?php echo $row['inventory']; ?></td>
                <td><textarea><?php echo $row['details']; ?></textarea></td>
              </tr>
          <?php }
          }
          ?>
        </table>

        <?php
        $sql = "SELECT * FROM users;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        ?>
        <h1>Users</h1>
        <table>
          <?php
          if ($resultCheck > 0) { ?>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Admin User</th>
            </tr>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?php echo $row['uidUsers']; ?></td>
                <td><?php echo $row['emailUsers']; ?></td>
                <td><?php if ($row['admin'] === '1') {
                  echo "Admin";
                } ?></td>
              </tr>
          <?php }
          }
          ?>
        </table>
      </div>
    </section>




    <!-- Admin page end -->

  <?php } else {
          header("Location: index.php");
          exit();
        } ?>
</main>
<?php require "footer.php"; ?>
