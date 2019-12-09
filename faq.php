<?php require "header.php"; ?>
<main>
  <div class="about-card" augmented-ui="tl-clip br-clip tr-clip-x exe">
    <h1>FAQ's</h1>
    <p>Here are some answers to our coustomers frequently asked questions.</p>
  </div>
  <div class="faq-list">
    <?php $sql = "SELECT * FROM faq;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="faq">
          <h2 class="q"><?php echo $row['question']; ?></h2>
          <p class="a"><?php echo $row['answer']; ?></p>
        </div>
<?php }
    } ?>
  </div>
</main>
<?php require "footer.php"; ?>
