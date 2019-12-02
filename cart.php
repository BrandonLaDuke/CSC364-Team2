<?php require "header.php"; ?>
<main>
  <?php if (isset($_SESSION['userId'])) { ?>
    <div class="cart">
      <h1>My Cart</h1>
      <table>
        <tr>
          <th>Item Name</th>
          <th>Price</th>
          <th>Action</th>
        </tr>
        <?php
        echo $_SESSION["cart"];
        if(!empty($_SESSION["cart"])) {
          $total = 0;
          foreach($_SESSION["cart"] as $keys => $values) {
            ?>
            <tr>
              <td><?php echo $values["gameTitle"]; ?></td>
              <td>$<?php echo $values["price"]; ?></td>
              <td><a href="cart.php?action=delete&gameId=<?php echo $values["gameId"]; ?>"><span class="danger-zone">Remove</span></td>
            </tr>
            <?php
          }
        }
         ?>
      </table>
    </div>


  <?php } else {
    header("Location: ../index.php");
    exit();
   } ?>
</main>
<?php require "footer.php"; ?>
