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
          <li><a href="adminpanel-edit-faq.php">Edit FAQ</a></li>
          <li><a href="adminpanel-documents.php">Project Documents</a></li>
        </ul>
      </div>

      <div class="cp-ga-info">
        <?php if (isset($_GET['error'])) {
          if ($_GET['error'] == "emptyfields") {
            echo '<p class="error" augmented-ui="tl-clip br-clip exe">Oops, that didn\'t work... Fill in all fields please.</p>';
          } elseif ($_GET['error'] == "sqlerror") {
            echo '<p class="error" augmented-ui="tl-clip br-clip exe">An error has occured within our database. Please contact us and let us know any details that might have caused this error.</p>';
          }
        } elseif (isset($_GET['add_faq'])) {
          if ($_GET['add_faq'] == "success") {
            echo '<p class="db-success" augmented-ui="tl-clip br-clip exe">Your Frenquently Asked Question has been added.</p>';
          }
        } elseif (isset($_GET['add_platform'])) {
          if ($_GET['add_platform'] == "success") {
            echo '<p class="db-success" augmented-ui="tl-clip br-clip exe">Your new platform has been added to the database.</p>';
          }
        } elseif (isset($_GET['add_game'])) {
          if ($_GET['add_game'] == "success") {
            echo '<p class="db-success" augmented-ui="tl-clip br-clip exe">Your game was successfully to the database.</p>';
          }
        }


         ?>
        <?php $sql = "SELECT * FROM games;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result); ?>
        <h1 class="head-txt">Games</h1>
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
        <h1 class="head-txt">Users</h1>
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
